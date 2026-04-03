<?php

namespace App\Service\Publisher\Settings;

use App\Helper\Static\Methods;
use App\Helper\Static\Vars;
use App\Jobs\Mail\User\SendEmailVerifyJob;
use App\Models\EmailJob;
use App\Models\User;
use App\Traits\JobTrait;
use Illuminate\Http\Request;

class LoginInfoService
{
    use JobTrait;

    public function init(Request $request, User $user)
    {
        $user->update([
            'new_email' => $request->email
        ]);

        EmailJob::create([
            'name' => "Send Email Verify Job",
            'path' => "SendEmailVerifyJob",
            'payload' => json_encode($user),
            'date' => now()->format(Vars::CUSTOM_DATE_FORMAT)
        ]);
    }
}
