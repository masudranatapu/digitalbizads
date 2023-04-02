@component('mail::message')
    # Hello {{ $user->name }}

    Please renew your DgitalBiz subscriptions, Otherwise your account will be restricted.

    @component('mail::button', ['url' => route('home-locale')])
        Click Here
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
