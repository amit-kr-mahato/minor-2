@component('mail::message')
# Hello {{ $notifiable->name }},

We’re happy to inform you that your business

<span style="color: #07e765; font-weight: bold;">"{{ $business->business_name }}"</span>

has been approved by the admin.

@component('mail::button', ['url' => url('/business/' . $business->id)])
View Business
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
