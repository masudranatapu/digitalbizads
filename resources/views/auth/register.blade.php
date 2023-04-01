@extends('layouts.web', ['nav' => false, 'banner' => false, 'footer' => false, 'cookie' => false, 'setting' => false, 'title' => true, 'title' => 'Sign Up'])

@section('custom-script')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection

@section('content')
    <section>
        <div class="flex flex-wrap">
            <div class="mt-10 pt-6 lg:pt-16 pb-6 w-full lg:w">
                <div class="max-w-md mx-auto login-box">
                    <div class="mb-6 lg:mb-20 w-full px-3 flex items-center justify-between"><a
                            class="text-3xl font-bold leading-none" href="{{ url('/') }}">{{ config('app.name') }}</a><a
                            class="py-2 px-6 text-lg rounded-l-xl rounded-t-xl bg-{{ $config[11]->config_value }}-600 hover:bg-{{ $config[11]->config_value }}-700 text-white font-bold transition duration-200"
                            href="{{ route('login') }}">{{ __('Sign In') }}</a></div>
                    <div>
                        <div class="mb-6 px-3">
                            <span class="text-gray-500">{{ __('Sign Up') }}</span>
                            <h3 class="text-2xl font-bold">{{ __('Create an account') }}</h3>
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3 flex p-4 mx-2 bg-gray-200 rounded">
                                <input class="w-full text-lg bg-gray-200 outline-none @error('name') is-invalid @enderror"
                                    id="name" name="name" type="text" value="{{ old('name') }}"
                                    placeholder="{{ __('Full Name') }}" required autocomplete="name" autofocus>
                                <svg class="h-6 w-6 ml-4 my-auto text-gray-300" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="mb-3 flex p-4 mx-2 bg-gray-200 rounded">
                                <input class="w-full text-lg bg-gray-200 outline-none @error('email') is-invalid @enderror"
                                    id="email" name="email" type="email" value="{{ old('email') }}"
                                    placeholder="{{ __('Enter your email') }}" required autocomplete="email">

                                <svg class="h-6 w-6 ml-4 my-auto text-gray-300" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                                    </path>
                                </svg>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="flex flex-wrap">
                                <div class="mb-3 flex lg:w-full p-4 mx-2 bg-gray-200 rounded">
                                    <input
                                        class="w-full text-lg bg-gray-200 outline-none @error('password') is-invalid @enderror"
                                        id="password" name="password" type="password"
                                        placeholder="{{ __('Enter your password') }}" required autocomplete="new-password">

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
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="mb-3 flex lg:w-full p-4 mx-2 bg-gray-200 rounded">
                                    <input class="w-full text-lg bg-gray-200 outline-none" id="password-confirm"
                                        name="password_confirmation" type="password"
                                        placeholder="{{ __('Enter your confirm password') }}" required
                                        autocomplete="new-password">

                                    <svg class="h-6 w-6 ml-4 my-auto text-gray-300" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                {{-- @if ($settings->recaptcha_configuration['RECAPTCHA_ENABLE'] == 'on')
                                    <div class="mb-3 w-full lg:w-1/2 px-2">
                                        {!! htmlFormSnippet() !!}
                                    </div>
                                @endif --}}

                                {{-- recaptcha --}}

                                {{-- @dd(env('RECAPTCHA_SITE_KEY')); --}}
                                {{-- @dd(env('RECAPTCHA_SECRET_KEY')); --}}
                                @if ($settings->recaptcha_enable == 'on')
                                    <div class="mb-2 flex p-2">
                                        <div class="g-recaptcha" data-sitekey="{{ $settings->recaptcha_site_key }}">
                                        </div>
                                    </div>

                                    @error('g-recaptcha-response')
                                        <small style="color: red;">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                @endif

                            </div>

                            <div class="px-3 text-center">
                                <button
                                    class="mb-2 w-full py-4 bg-{{ $config[11]->config_value }}-600 hover:bg-{{ $config[11]->config_value }}-700 rounded text-lg font-bold text-gray-50 transition duration-200">{{ __('Sign Up') }}</button>
                                <span class="text-gray-400 text-lg">
                                    <span>{{ __('Already have an account?') }}</span>
                                    <a class="text-{{ $config[11]->config_value }}-600 hover:underline"
                                        href="{{ route('login') }}">{{ __('Sign In') }}</a>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
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
