@extends('layouts.web', ['nav' => false, 'banner' => false, 'footer' => false, 'cookie' => false, 'setting' => false,
'title' => true, 'title' => __('Sign In')])

@section('content')
<section>
    <div class="flex flex-wrap">
        <div class="mt-10 pt-6 lg:pt-16 pb-6 w-full lg:w">
            <div class="max-w-md mx-auto login-box">
                <div class="mb-6 lg:mb-20 w-full px-3 flex items-center justify-between"><a
                        class="text-3xl font-bold leading-none" href="{{ url('/') }}">{{ config('app.name') }}</a><a
                        class="py-2 px-6 text-lg rounded-l-xl rounded-t-xl bg-{{ $config[11]->config_value }}-600 hover:bg-{{ $config[11]->config_value }}-700 text-white font-bold transition duration-200"
                        href="{{ route('register') }}">{{ __('Sign Up') }}</a></div>
                <div>
                    <div class="mb-6 px-3">
                        <span class="text-gray-500">{{ __('Sign In') }}</span>
                        <h3 class="text-2xl font-bold">{{ __('Sign in your account') }}</h3>
                    </div>

                    @error('email')
                    <span class="ml-3 invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    @error('password')
                    <span class="ml-3 invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3 flex p-4 mx-2 bg-gray-200 rounded">
                            <input class="w-full text-lg bg-gray-200 outline-none @error('email') is-invalid @enderror"
                                id="email" type="email" placeholder="{{ __('Enter your email') }}" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                            <svg class="h-6 w-6 ml-4 my-auto text-gray-300" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                                </path>
                            </svg>
                        </div>

                        <div class="mb-2 flex p-4 mx-2 bg-gray-200 rounded">
                            <input
                                class="w-full text-lg bg-gray-200 outline-none @error('password') is-invalid @enderror"
                                id="password" type="password" placeholder="{{ __('Enter your password') }}"
                                name="password" required autocomplete="current-password">

                            <svg class="h-6 w-6 ml-4 my-auto text-gray-300" xmlns="http://www.w3.org/2000/svg"
                                onmouseover="mouseoverPass();" onmouseout="mouseoutPass();" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                        </div>

                        @if ($settings->recaptcha_configuration['RECAPTCHA_ENABLE'] == 'on')
                            <div class="mb-3 w-full lg:w-1/2 px-2">
                                {!! htmlFormSnippet() !!}
                            </div>
                        @endif

                        @if (Route::has('password.request'))
                        <p class="mb-4 ml-3 text-lg text-gray-400"><a class="underline hover:text-gray-500"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a></p>
                        @endif

                        <div class="px-3 text-center">
                            <button
                                class="mb-2 w-full py-4 bg-{{ $config[11]->config_value }}-600 shadow-lg hover:bg-{{ $config[11]->config_value }}-700 rounded text-lg font-bold text-gray-50 transition duration-200">{{ __('Sign In') }}</button>

                            @if ($settings->google_configuration['GOOGLE_ENABLE'] == 'on')
                            <a href="{{ route('login.google') }}">
                                <button type="button"
                                    class="mb-2 w-full py-4 bg-white-200 hover:bg-white-300 rounded shadow-lg text-lg font-bold text-dark transition duration-200">
                                    <img class="h-6 mr-4 mb-1 w-6 inline"
                                        src="data:image/png;base64,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" />

                                    {{ __('Continue with Google') }}</button></a>
                            @endif

                            <span class="text-gray-400 text-lg">
                                <span>{{ __('If you do not have an account?') }}</span>
                                <a class="text-{{ $config[11]->config_value }}-600 hover:underline"
                                    href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@push('custom-js')
<script>
    function mouseoverPass(obj) {
    "use strict";
    var obj = document.getElementById('password');
    obj.type = "text";
}
function mouseoutPass(obj) {
    "use strict";
    var obj = document.getElementById('password');
    obj.type = "password";
}
</script>
@endpush
@endsection
