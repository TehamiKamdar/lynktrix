<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class EmailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->greeting("Hello {$notifiable->first_name}!")
                ->subject('Verify Email Address to join LinksCircle')
                ->line('Your account has been Registered Successfully!')
                ->line('Please click the button below to verify your email address.')
                ->action('Verify Email Address', $url)
                ->line('Please Note: For security reasons, your account status is Pending. Rest assured; Your Account Manager will reach out to you shortly with further information. We will notify you once your Account gets approved.')
                ->line('If you did not create an account, no further action is required.');
        });

        ResetPassword::toMailUsing(function ($notifiable, string $token) {

            $url = route("password.reset", ['token' => $token, 'email' => $notifiable->getEmailForPasswordReset()]);

            return (new MailMessage)
                ->greeting("Hello {$notifiable->first_name}!")
                ->subject('LinksCircle Account Password Reset')
                ->line('You are receiving this email because we received a password reset request for your account.')
                ->action('Reset Password', $url)
                ->line('This password reset link will expire in 60 minutes.')
                ->line('If you did not request a password reset, no further action is required.');
        });
    }
}
