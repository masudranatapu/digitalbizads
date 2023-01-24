@extends('layouts.web', ['nav' => false, 'banner' => false, 'footer' => false, 'cookie' => false, 'setting' => false, 'title' => true, 'title' => 'Reset Password'])

@section('content')
<section>
    <div class="flex flex-wrap">
        <div class="pt-6 lg:pt-16 pb-6 w-full lg:w-1/2">
            <div class="max-w-md mx-auto">
                <div class="mb-6 lg:mb-20 w-full px-3 flex items-center justify-between"><a
                        class="text-3xl font-bold leading-none" href="{{ url('/') }}">{{ config('app.name') }}</a></div>
                <div>
                    <div class="mb-6 px-3">
                        <h3 class="text-2xl font-bold">{{ __('Reset Password') }}</h3>
                    </div>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-3 flex p-4 mx-2 bg-gray-200 rounded">
                            <input class="w-full text-xs bg-gray-200 outline-none @error('email') is-invalid @enderror"
                                id="email" type="email" placeholder="{{ __('Enter your email') }}" name="email"
                                value="{{ urldecode(request()->get('email')) }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <svg class="h-6 w-6 ml-4 my-auto text-gray-300" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                                </path>
                            </svg>
                        </div>

                        <div class="mb-2 flex p-4 mx-2 bg-gray-200 rounded">
                            <input
                                class="w-full text-xs bg-gray-200 outline-none @error('password') is-invalid @enderror"
                                id="password" type="password" placeholder="{{ __('Enter your password') }}" name="password" required
                                autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <button>
                                <svg class="h-6 w-6 ml-4 my-auto text-gray-300" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg>
                            </button>
                        </div>

                        <div class="mb-2 flex p-4 mx-2 bg-gray-200 rounded">
                            <input
                                class="w-full text-xs bg-gray-200 outline-none @error('password') is-invalid @enderror"
                                id="password-confirm" type="password" placeholder="{{ __('Enter your confirm password') }}" name="password_confirmation" required
                                autocomplete="new-password">

                            <button>
                                <svg class="h-6 w-6 ml-4 my-auto text-gray-300" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg>
                            </button>
                        </div>

                        <div class="px-3 text-center">
                            <button type="submit"
                                class="mb-2 w-full py-4 bg-{{ $config[11]->config_value }}-600 hover:bg-{{ $config[11]->config_value }}-700 rounded text-lg font-bold text-gray-50 transition duration-200">{{ __('Reset Password') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="hidden lg:block relative w-full lg:w-1/2 bg-{{ $config[11]->config_value }}-600">
            <div class="absolute bottom-0 inset-x-0 mx-auto mb-12 max-w-xl text-center authentication">
                <img class="lg:max-w-xl mx-auto" src="{{ asset($config[13]->config_value) }}" alt="{{ $config[0]->config_value }}">

            </div>
        </div>

    </div>
</section>
@endsection
