@component('mail::message')
    #Dear {{ $userDetails->name }},

    BizAd is temporarily disabled your account , please contact with Admin.

    Thanks,
    {{ config('app.name') }}
@endcomponent
