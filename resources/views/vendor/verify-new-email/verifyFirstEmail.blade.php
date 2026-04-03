@component('mail::message')
# Verify Email Address

Please click the button below to verify your email address.

@component('mail::button', ['url' => url($url)])
Verify Email Address
@endcomponent

Please Note: For security reasons, your account status is Pending. Rest assured; Your Account Manager will reach out to you shortly with further information. We will notify you once your Account gets approved.

If you did not create an account, no further action is required.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
