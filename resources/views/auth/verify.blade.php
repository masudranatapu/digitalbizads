@extends('layouts.web', ['nav' => false, 'banner' => false, 'footer' => false, 'cookie' => false, 'setting' => false,
'title' => true, 'title' => 'Verify'])

@section('content')
<section>
    <div class="flex flex-wrap">
        <div class="pt-6 lg:pt-16 pb-6 w-full lg:w-full mt-48">
            <div class="max-w-md mx-auto">
                <div>
                    <div class="mb-6 px-3 text-center">
                        <span class="text-gray-500"><a class="text-3xl font-bold leading-none"
                                href="{{ url('/') }}">{{ config('app.name') }}</a></span>
                        <h3 class="text-2xl font-bold mb-5">{{ __('Verify Your Email Address') }}</h3>
                        @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                        @endif
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <div class="px-3 mt-3 text-center">
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit"
                                    class="mb-6 w-full p-4 bg-blue-600 hover:bg-blue-700 rounded text-lg font-bold text-gray-50 transition duration-200">{{ __('click here to request another') }}</button>.
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
