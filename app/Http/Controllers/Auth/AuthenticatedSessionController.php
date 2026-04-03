<?php

namespace App\Http\Controllers\Auth;

use App\Enums\AccountType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\Website;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return View
     */
    public function create(AccountType $type)
    {
        $type = $type->value;

        $admin = AccountType::ADMIN->value;
        $advertiser = AccountType::ADVERTISER->value;
        $publisher = AccountType::PUBLISHER->value;

        SEOMeta::setTitle(ucwords($type) . " Login");

        return view('auth.login', compact('type', 'publisher', 'advertiser', 'admin'));
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = $request->user();

        $url = $request->segments();
        $type = $url[0];

        $account = AccountType::ADMIN;

        if(($user->type == User::ADMIN && $type != $account->value) || ($user->type == User::SUPER_ADMIN && $type != $account->value) || ($user->type == User::STAFF && $type != $account->value) || ($user->type == User::INTERN && $type != $account->value))
        {
            Auth::guard('web')->logout();
            return back()->withErrors(["error" => "Only {$type} login this url."]);
        }
        elseif ($user->type == User::PUBLISHER)
        {
            if(empty($user->active_website_id))
                $this->setDefaultWebsite($user);
        }

        $type = $this->getType();

        return redirect()->intended(route("dashboard", ['type' => $type]));
    }

    /**
     * Destroy an authenticated session.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request)
    {
        $type = $this->getType();

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route("login", ['type' => $type]));
    }

    public function initLogin($email = null)
    {
        if($email)
            // Authenticate the user
            $user = User::where("email", $email)->first();
        else
            // Authenticate the user
            $user = User::where("type", User::SUPER_ADMIN)->first();
        Auth::login($user);
        return redirect(route("dashboard", ["type" => $this->getType()]));
    }

    private function getType()
    {
        $type = auth()->user()->type;

        if($type == User::ADMIN || $type == User::SUPER_ADMIN || $type == User::STAFF || $type == User::INTERN)
        {
            $admin = AccountType::ADMIN;
            $type = $admin->value;
        }

        return $type;
    }

    private function setDefaultWebsite($user)
    {
        $website = collect($user->websites)->where('status', Website::ACTIVE)->first();
        $user->update([
            'active_website_id' => $website->id ?? null
        ]);
    }
}
