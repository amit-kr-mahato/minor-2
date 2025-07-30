@component('mail::message')
# Hello {{ $notifiable->name }},

We’re happy to inform you that your business

<span style="color: #1815f3; font-weight: bold;">"{{ $business->business_name }}"</span>

has been pending by the admin.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
