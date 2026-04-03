<?php

namespace App\Http\Controllers\Auth;

use App\Enums\AccountType;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(EmailVerificationRequest $request)
    {
        $type = $this->getType();

        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route("dashboard", ['type' => $type]).'?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect()->intended(route("dashboard", ['type' => $type]).'?verified=1');
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
}
