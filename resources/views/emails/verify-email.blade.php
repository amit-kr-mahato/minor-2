@component('mail::message')
<img src="{{ asset('frontend/images/logo.png') }}" alt="Logo" width="150px"> 
<br>
# Hello {{ $user->name }},

Thank you for registering with us!

Please verify your email address by clicking the button below:

@component('mail::button', ['url' => $url])
Verify Email
@endcomponent

This verification link will expire in 60 minutes.

If you did not create an account, no further action is required.

Thanks,<br>
{{ config('app.name') }}

@endcomponent
