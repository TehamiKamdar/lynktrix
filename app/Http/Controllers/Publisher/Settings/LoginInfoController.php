<?php

namespace App\Http\Controllers\Publisher\Settings;

use App\Helper\Static\Vars;
use App\Http\Requests\Publisher\UpdateUserNameRequest;
use App\Models\User;
use App\Service\Publisher\Settings\LoginInfoService;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;

class LoginInfoController extends BaseController
{

    public function actionLoginInfo()
    {
        $user = auth()->user();
        $this->loadPublishers($user);

        $publisher = $user->publisher;

        $type = Vars::LOGIN_INFO;

        SEOMeta::setTitle("Login Information (Username)");

        return view("template.publisher.settings.index", compact('type', 'user', 'publisher'));

    }

    public function actionLoginInfoUpdate(UpdateUserNameRequest $request)
    {
        try {
            $user = auth()->user();

            $user->update([
                "user_name" => $request->user_name
            ]);

            return redirect()->route('publisher.account.login-info.index')->with("success", "Username Successfully Updated.");

        } catch (\Exception $exception) {

            return redirect()->route('publisher.account.login-info.index')->with("error", $exception->getMessage());

        }
    }

    public function actionChangeEmail()
    {
        $user = auth()->user();
        $this->loadPublishers($user);

        $publisher = $user->publisher;

        $type = Vars::LOGIN_INFO;

        SEOMeta::setTitle("Login Information (User Email)");

        return view("template.publisher.settings.index", compact('type', 'user', 'publisher'));

    }

    public function actionChangeEmailUpdate(Request $request, LoginInfoService $service)
    {
        try {

            $validatedData = $request->validate([
                'email' => 'required|confirmed|email',
            ]);

            $user = auth()->user();

            if($request->email == $user->email || $request->email == $user->new_email) {
                return redirect()->route('publisher.account.login-info.change-email')->with("error", "Your given email address already in use.");
            } elseif ($request->email != $user->email && $request->email != $user->new_email) {
                $service->init($request, $user);
                return redirect()->route('publisher.account.login-info.change-email')->with("success", "Send Verification Email on old email address. After successful verify then email address will be change.");
            }

        } catch (\Exception $exception) {

            return redirect()->route('publisher.account.login-info.change-email')->with("error", $exception->getMessage());

        }
    }

    public function actionVerifyEmail($url)
    {
        $user = User::where('new_email', decrypt($url))->first();
        if($user)
        {
            $user->newEmail($user->new_email);

            $user->update([
                'new_email' => null
            ]);

            Session::put("success", "Verification email send on your new email address. Now verify your new email address.");
        }
        else {
            Session::put("error", "Link expired! Unable to change email address.");
        }

        return redirect(route("dashboard", ["type" => User::PUBLISHER]));
    }

    public function actionChangePassword()
    {
        $user = auth()->user();
        $this->loadPublishers($user);

        $publisher = $user->publisher;

        $type = Vars::LOGIN_INFO;

        SEOMeta::setTitle("Login Information (Login Password)");

        return view("template.publisher.settings.index", compact('type', 'user', 'publisher'));
    }

    public function actionChangePasswordUpdate(Request $request)
    {
        try {

            $request->validate([
                'current_password' => 'required',
                'password' => ['required', 'confirmed', Password::defaults()],
            ]);

            $user = auth()->user();
            $hashedPassword = $user->password;
            if(Hash::check($request->current_password , $hashedPassword) && !Hash::check($request->password , $hashedPassword))
            {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
            }

            return redirect()->route('publisher.account.login-info.change-password')->with("success", "Password Successfully Updated.");

        } catch (\Exception $exception) {

            return redirect()->route('publisher.account.login-info.change-password')->with("error", $exception->getMessage());

        }
    }

}
