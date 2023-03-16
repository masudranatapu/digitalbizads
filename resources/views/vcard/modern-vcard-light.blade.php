<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $card_details->title }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}

    <link rel="icon" href="{{ url('/') }}{{ $business_card_details->profile }}" sizes="96x96" type="image/png" />

    <!-- CSS files -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/tailwind.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body class="antialiased bg-body text-body font-body"
    dir="{{(App::isLocale('ar') || App::isLocale('ur') || App::isLocale('he') ? 'rtl' : 'ltr')}}">
    <div>
        @if ($business_card_details != null)
        <div id="profile"
            class="leading-tight min-h-screen lg:bg-{{ $business_card_details->theme_color }}-800 bg-grey-lighter p-1">
            <div class="lg:p-2"></div>
            <div class="max-w-xl w-full mx-auto bg-white rounded-lg overflow-hidden shadow-lg">
                <div class="bg-cover h-40"
                    style="background-image: url('{{ url('/') }}{{ $business_card_details->cover }}'); ">
                </div>
                <div class="border-b px-4 pb-2">
                    <div class="text-center -mt-16 sm:text-left sm:flex mb-4">
                        <img class="h-32 w-32 rounded-full border-2 border-white mr-4 md:ml-24 lg:ml-12 profile"
                            src="{{ url('/') }}{{ $business_card_details->profile }}"
                            alt="{{ $business_card_details->title }}" />

                    </div>

                    <div class="text-center">
                        <div class="pt-0 pb-3">
                            <h3 class="font-bold text-gray-800 text-2xl mb-1">
                                {{ $business_card_details->title }}
                            </h3>
                            <p class="text-gray-800">{{ $card_details->sub_title }}</p>

                            @if ($business_card_details->description != null || $business_card_details->address != null)
                            <p class="pt-4 text-gray-800">
                                {{ $business_card_details->description }}
                            </p>
                            @endif
                        </div>
                    </div>
                </div>

                @foreach ($feature_details as $feature)
                <ul class="grid grid-flow-col grid-cols-1 grid-rows-1">
                    @if ($feature->type == 'email')
                    <a class="break-word" href="mailto:{{ $feature->content }}">
                        @endif

                        @if ($feature->type == 'tel')
                        <a class="break-word" href="tel:{{ $feature->content }}">
                            @endif

                            @if ($feature->type == 'wa')
                            <a class="break-word" href="http://wa.me/{{ $feature->content }}" target="_blank">
                                @endif

                                @if ($feature->type == 'url')
                                <a class="break-all" href="https://{{ str_replace('https://', '', $feature->content) }}"
                                    target="_blank">
                                    @endif

                                    @if ($feature->type != 'youtube' && $feature->type != 'map')
                                    <li>
                                        <div class="flex items-center w-full px-5 ">
                                            <div
                                                class="flex justify-center items-center content-center bg-gradient-to-br from-{{ $business_card_details->theme_color }}-300 to-{{ $business_card_details->theme_color }}-800 shadow-md hover:shadow-lg h-12 w-12 rounded-full fill-current text-white">
                                                <i class="{{ $feature->icon }}"></i>
                                            </div>
                                            <div class="w-3/4 mx-5 my-6">
                                                <p class="font-semibold text-gray-800 break-word text-lg">
                                                    {{ $feature->label }}</p>

                                                <p class="font-medium text-gray-800 pt-1 break-word text-base">
                                                    {{ $feature->content }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    @endif

                                    @if ($feature->type == 'url' || $feature->type == 'wa' || $feature->type == 'tel' ||
                                    $feature->type == 'email')
                                </a>
                                @endif
                </ul>
                @endforeach



                @if ($service_details != null && !$service_details->isEmpty())

                <div class="w-full border-t px-5 align-middle py-4 border-b">
                    <p class="text-gray-700 font-semibold text-lg">{{ __('Services') }}</p>
                </div>

                <div class="px-5 py-4">
                    @foreach ($service_details as $service_detail)
                    <div class="mb-3">
                        <div class="w-full overflow-hidden rounded-lg shadow-lg">
                            <a href="{{ asset($service_detail->service_image) }}" data-toggle="lightbox"
                                data-gallery="gallery" class="col-md-4">
                                <img class="w-full" src="{{ asset($service_detail->service_image) }}"
                                    alt="{{ $service_detail->service_name }}" />
                            </a>
                            <div class="px-5 py-3">
                                <div class="mb-2">
                                    <div class="text-gray-800 font-semibold text-lg mb-2">
                                        {{ $service_detail->service_name }}
                                    </div>
                                    <p class="text-grey-800 text-base">
                                        {{ $service_detail->service_description }}
                                    </p>
                                </div>

                                @if ($enquiry_button != null)
                                @if ($service_detail->enable_enquiry == 'Enabled')
                                <div class="mt-5 mb-2">
                                    <a href="https://wa.me/{{ $enquiry_button }}?text={{ __('Hi, I am interested in your product/service:') }} {{ $service_detail->service_name }}. {{ __('Please provide more details.') }}"
                                        target="_blank"
                                        class="flex-1 rounded-full bg-{{ $business_card_details->theme_color }}-500 font-semibold hover:bg-{{ $business_card_details->theme_color }}-800 text-white antialiased px-4 py-2">
                                        {{ __('Make WhatsApp Enquiry') }}
                                    </a>
                                </div>
                                @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif

                @if ($galleries_details != null && !$galleries_details->isEmpty())

                <div class="w-full border-t px-5 align-middle py-4 border-b">
                    <p class="text-gray-700 font-semibold text-lg">{{ __('Image Gallery') }}</p>
                </div>

                <div id="gallery" class="px-5 py-4">
                    @foreach ($galleries_details as $galleries_detail)
                    <div class="mb-3">
                        <div class="w-full overflow-hidden rounded-lg shadow-lg">
                            <a href="{{ asset($galleries_detail->gallery_image) }}" data-toggle="lightbox"
                                data-gallery="gallery" class="col-md-4">
                                <img class="w-full" src="{{ asset($galleries_detail->gallery_image) }}"
                                    alt="{{ $galleries_detail->caption }}" />
                            </a>
                            <div class="px-5 py-3">
                                <div class="mb-2">
                                    <div class="text-gray-800 font-semibold text-lg">
                                        {{ $galleries_detail->caption }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif

                @if ($feature_details != null && !$feature_details->isEmpty())
                <div id="youtube" class="px-5 py-4">
                    @foreach ($feature_details as $feature)
                    @if ($feature->type == 'youtube')
                    <div class="w-full border-t px-5 align-middle py-4 border-b">
                        <p class="text-gray-700 font-semibold text-lg">{{ __('Youtube Videos') }}</p>
                    </div>
                    <div class="mb-3">
                        <div class="w-full overflow-hidden rounded-lg shadow-lg">
                            <iframe class="w-full h-64 text-white"
                                src="https://www.youtube.com/embed/{{ $feature->content }}"
                                title="{{ $feature->label }}" frameborder="0" allowfullscreen></iframe>
                            <div class="px-5 py-3">
                                <div class="mb-2">
                                    <div class="text-gray-800 font-semibold text-lg">
                                        {{ $feature->label }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                @endif

                @if (count($payment_details) > 0)

                <div class="w-full border-t px-5 align-middle py-4 border-b">
                    <p class="text-gray-700 font-semibold text-lg">{{ __('Payment Details') }}</p>
                </div>

                @foreach ($payment_details as $payment)

                <ul class="grid grid-flow-col grid-cols-1 grid-rows-1">

                    @if ($payment->type == 'url')
                    @if(substr($payment->content, 0, 3) == "upi")
                    <a href="{{ str_replace('https://', '', $payment->content) }}" target="_blank">
                        @else
                        <a href="https://{{ str_replace('https://', '', $payment->content) }}" target="_blank">
                            @endif
                            @endif

                            <li>
                                <div class="flex items-center w-full px-5 ">
                                    <div
                                        class="flex justify-center items-center content-center bg-gradient-to-br from-{{ $business_card_details->theme_color }}-300 to-{{ $business_card_details->theme_color }}-800 shadow-md hover:shadow-lg h-12 w-12 rounded-full fill-current text-white">
                                        <i class="{{ $payment->icon }}"></i>
                                    </div>
                                    <div class="w-3/4 mx-5 my-6">
                                        <p class="font-semibold break-word text-gray-800 text-lg">
                                            {{ $payment->label }}</p>

                                        <p class="font-medium text-gray-800 pt-1 break-word text-base">
                                            {{ $payment->content }}</p>
                                    </div>
                                </div>
                            </li>
                            @if ($payment->type == 'url')
                        </a>
                        @endif
                </ul>

                @endforeach
                @endif

                @if ($business_hours != null && $business_hours->is_display != 0)

                <div class="w-full border-t px-5 align-middle py-4 border-b">
                    <p class="text-gray-700 font-semibold text-lg">{{ __('Business Hours') }}</p>
                </div>


                <div class="px-5 py-4">

                    @if ($business_hours->is_always_open != 'Opening')
                    <div>
                        <p class="pt-2 font-semibold text-gray-800">{{ __('Monday') }}: {{ __($business_hours->Monday)
                            }}</p>
                        <p class="pt-2 font-semibold text-gray-800">{{ __('Tuesday') }}: {{ __($business_hours->Tuesday)
                            }}</p>
                        <p class="pt-2 font-semibold text-gray-800">{{ __('Wednesday') }}: {{
                            __($business_hours->Wednesday) }}</p>
                        <p class="pt-2 font-semibold text-gray-800">{{ __('Thursday') }}: {{
                            __($business_hours->Thursday) }}</p>
                        <p class="pt-2 font-semibold text-gray-800">{{ __('Friday') }}: {{ __($business_hours->Friday)
                            }}</p>
                        <p class="pt-2 font-semibold text-gray-800">{{ __('Saturday') }}: {{
                            __($business_hours->Saturday) }}</p>
                        <p class="pt-2 font-semibold text-gray-800">{{ __('Sunday') }}: {{ __($business_hours->Sunday)
                            }}</p>
                    </div>
                    @else
                    <div>
                        <p class="pt-2 py-4 font-semibold text-green-800">{{ __('Always Open') }}</p>
                    </div>
                    @endif
                </div>
                @endif

                @if ($feature_details != null && !$feature_details->isEmpty())
                <div id="youtube" class="px-5 py-4">
                    @foreach ($feature_details as $feature)
                    @if ($feature->type == 'map')
                    <div class="w-full border-t px-5 align-middle py-4 border-b">
                        <p class="text-gray-700 font-semibold text-lg">{{ __('Location') }}</p>
                    </div>
                    <div class="mb-3">
                        <div class="w-full overflow-hidden rounded-lg shadow-lg">
                            <iframe src="https://www.google.com/maps/embed?{{ $feature->content }}" class="w-full h-64"
                                frameborder="0" allowfullscreen></iframe>
                            <div class="px-5 py-3">
                                <div class="mb-2">
                                    <div class="text-gray-800 font-semibold text-lg">
                                        {{ $feature->label }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                @endif

                <div class="lg:block hidden w-full ml-6 pb-3 mx-auto border-t pt-3">
                    <ul class="grid grid-flow-col grid-cols-6 grid-rows-1">
                        {{-- Send vCard --}}
                        <li class="flex send-modal-open cursor-pointer items-center">
                            <div
                                class="flex justify-center items-center content-center bg-gradient-to-br from-{{ $business_card_details->theme_color }}-300 to-{{ $business_card_details->theme_color }}-800 shadow-md hover:shadow-lg h-16 w-16 rounded-full fill-current text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="10" y1="14" x2="21" y2="3"></line>
                                    <path
                                        d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5">
                                    </path>
                                </svg>
                            </div>
                        </li>

                        {{-- Scan QR --}}
                        <li class="flex modal-open cursor-pointer items-center">
                            <div
                                class="flex justify-center items-center content-center bg-gradient-to-br from-{{ $business_card_details->theme_color }}-300 to-{{ $business_card_details->theme_color }}-800 shadow-md hover:shadow-lg h-16 w-16 rounded-full fill-current text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                                </svg>
                            </div>
                        </li>

                        {{-- Download vCard --}}
                        <li class="flex items-center cursor-pointer">
                            <a href="{{ route('download.vCard', $business_card_details->card_id) }}">
                                <div
                                    class="flex justify-center items-center content-center bg-gradient-to-br from-{{ $business_card_details->theme_color }}-300 to-{{ $business_card_details->theme_color }}-800 shadow-md hover:shadow-lg h-16 w-16 rounded-full fill-current text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>


                <div id="share" class="w-full border-t px-5 align-middle py-4 border-b">
                    <p class="text-gray-700 font-semibold text-lg">{{ __('Share on') }}</p>
                </div>

                <div class="w-full ml-6 pb-3 mx-auto border-t pt-3">
                    <ul class="grid grid-flow-col lg:grid-cols-8 grid-cols-6 grid-rows-1">

                        <a target="_blank" href="{{ $shareComponent['facebook'] }}">
                            <li class="flex cursor-pointer items-center">
                                <div
                                    class="flex justify-center items-center content-center bg-gradient-to-br from-{{ $business_card_details->theme_color }}-300 to-{{ $business_card_details->theme_color }}-800 shadow-md hover:shadow-lg h-12 w-12 rounded-full fill-current text-white">
                                    <i class="fab fa-facebook"></i>
                                </div>
                            </li>
                        </a>

                        <a target="_blank" href="{{ $shareComponent['twitter'] }}">
                            <li class="flex cursor-pointer items-center">
                                <div
                                    class="flex justify-center items-center content-center bg-gradient-to-br from-{{ $business_card_details->theme_color }}-300 to-{{ $business_card_details->theme_color }}-800 shadow-md hover:shadow-lg h-12 w-12 rounded-full fill-current text-white">
                                    <i class="fab fa-twitter"></i>
                                </div>
                            </li>
                        </a>

                        <a target="_blank" href="{{ $shareComponent['linkedin'] }}">
                            <li class="flex cursor-pointer items-center">
                                <div
                                    class="flex justify-center items-center content-center bg-gradient-to-br from-{{ $business_card_details->theme_color }}-300 to-{{ $business_card_details->theme_color }}-800 shadow-md hover:shadow-lg h-12 w-12 rounded-full fill-current text-white">
                                    <i class="fab fa-linkedin"></i>
                                </div>
                            </li>
                        </a>

                        <a target="_blank" href="{{ $shareComponent['telegram'] }}">
                            <li class="flex cursor-pointer items-center">
                                <div
                                    class="flex justify-center items-center content-center bg-gradient-to-br from-{{ $business_card_details->theme_color }}-300 to-{{ $business_card_details->theme_color }}-800 shadow-md hover:shadow-lg h-12 w-12 rounded-full fill-current text-white">
                                    <i class="fab fa-telegram"></i>
                                </div>
                            </li>
                        </a>

                        <a target="_blank" href="{{ $shareComponent['whatsapp'] }}">
                            <li class="flex cursor-pointer items-center">
                                <div
                                    class="flex justify-center items-center content-center bg-gradient-to-br from-{{ $business_card_details->theme_color }}-300 to-{{ $business_card_details->theme_color }}-800 shadow-md hover:shadow-lg h-12 w-12 rounded-full fill-current text-white">
                                    <i class="fab fa-whatsapp"></i>
                                </div>
                            </li>
                        </a>

                    </ul>
                </div>


                @if ($plan_details['hide_branding'] == "1")
                <div class="pb-1">
                    <div
                        class="flex pb-5 px-3 m-auto pt-5 font-semibold text-dark text-sm flex-col md:flex-row max-w-6xl">
                        <div class="mt-2">
                            {{ __('Copyright') }} &copy;
                            <a class="text-{{ $business_card_details->theme_color }}-800" href="{{ url()->current() }}">
                                {{ $card_details->title }} </a>
                            <span id="year"></span>{{ __('. All Rights Reserved.') }}
                        </div>
                    </div>
                </div>
                @else
                <div class="pb-1">
                    <div
                        class="flex pb-5 px-3 m-auto pt-5 font-semibold border-t text-gray-800 text-sm flex-col md:flex-row max-w-6xl">
                        <div class="mt-2">
                            {{ __('Made with') }}
                            <a class="text-{{ $business_card_details->theme_color }}-800" href="{{ url('/') }}"> {{
                                config('app.name') }} </a>
                            <span id="year"></span>{{ __('. All Rights Reserved.') }}
                        </div>
                    </div>
                </div>

                @endif

            </div>
            <div class="p-8"></div>

        </div>

        <div
            class="lg:hidden bg-{{ $business_card_details->theme_color }}-800 fixed bottom-0 w-full border-t border-gray-200 flex">
            <a href="#profile"
                class="flex flex-grow items-center justify-center p-2 text-gray-50 hover:text-gray-50 bg-{{ $business_card_details->theme_color }}-800">
                <div class="text-center">
                    <span class="block h-8 grid justify-items-center text-3xl leading-8">
                        <svg class="h-6 w-6 text-grey mr-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                        </svg>
                    </span>
                    <span class="block text-xs leading-none">{{ __('Profile') }}</span>
                </div>
            </a>

            {{-- Send vCard --}}
            <a href="#"
                class="flex send-modal-open flex-grow items-center justify-center p-2 text-gray-50 hover:text-gray-50 bg-{{ $business_card_details->theme_color }}-800">
                <div class="text-center">
                    <span class="block h-8 grid justify-items-center text-3xl leading-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="10" y1="14" x2="21" y2="3"></line>
                            <path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5">
                            </path>
                        </svg>
                    </span>
                    <span class="block text-xs leading-none">{{ __('Send') }}</span>
                </div>
            </a>

            {{-- Scan QR --}}
            <a href="#"
                class="flex modal-open flex-grow items-center justify-center p-2 text-gray-50 hover:text-gray-50 bg-{{ $business_card_details->theme_color }}-800">
                <div class="text-center">
                    <span class="block h-8 grid justify-items-center text-3xl leading-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                        </svg>
                    </span>
                    <span class="block text-xs leading-none">{{ __('Scan QR') }}</span>
                </div>
            </a>

            {{-- Save Contact --}}
            <a href="{{ route('download.vCard', $business_card_details->card_id) }}"
                class="flex flex-grow items-center justify-center p-2 text-gray-50 hover:text-gray-50 bg-{{ $business_card_details->theme_color }}-800">
                <div class="text-center">
                    <span class="block h-8 grid justify-items-center text-3xl leading-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                    </span>
                    <span class="block text-xs leading-none">{{ __('Save Contact') }}</span>
                </div>
            </a>

            <a href="#share"
                class="flex flex-grow items-center justify-center p-2 text-gray-50 hover:text-gray-50 bg-{{ $business_card_details->theme_color }}-800">
                <div class="text-center">
                    <span class="block h-8 grid justify-items-center text-3xl leading-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                        </svg>
                    </span>
                    <span class="block text-xs leading-none">{{ __('Share') }}</span>
                </div>
            </a>
        </div>

        {{-- Send vCard --}}
        <div
            class="send-modal opacity-0 transition duration-300 ease-in-out pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
            <div class="send-modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
            <div class="modal-container bg-white w-full md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                <div class="modal-content py-4 text-left px-6">
                    <div class="justify-between items-center">
                        <div class="text-left my-3">
                            <label class="mt-6 block text-gray-700 text-sm font-bold mb-2" for="phone_number">{{
                                __("Phone Number") }}</label>
                            <input id="phone_number"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                placeholder="{{ __('For ex: 91987654310') }}">
                            <small>{{ __('For ex: 91987654310 (With Country code) (Without +)') }}</small>
                        </div>
                        <button
                            class="flex justify-center items-center content-center bg-gradient-to-br from-{{ $business_card_details->theme_color }}-300 to-{{ $business_card_details->theme_color }}-800 shadow-md hover:shadow-lg h-14 w-12 py-2 px-8 fill-current text-white"
                            onclick="sendVcard()">
                            {{ __('Send') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- QR --}}
        <div
            class="modal opacity-0 transition duration-300 ease-in-out  pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
            <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
            <div class="modal-container bg-white w-auto md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                <div class="modal-content py-4 text-left px-6">
                    <div class="justify-between items-center">
                        <img
                            src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl={{ url('/') }}/{{ $card_details->card_url }}&choe=UTF-8">
                        <a download="qr.png"
                            href="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl={{ url('/') }}/{{ $card_details->card_url }}&choe=UTF-8"
                            class="flex justify-center items-center content-center bg-gradient-to-br from-{{ $business_card_details->theme_color }}-300 to-{{ $business_card_details->theme_color }}-800 shadow-md hover:shadow-lg h-16 w-16 rounded-full fill-current text-white qr-code-download">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @else

        <div id="profile" class="leading-tight min-h-screen bg-grey-lighter p-1">
            <br>
            <h4>{{ __('403') }}</h4>
            <h6>{{ __('Oops! Basic details are missing.') }}</h6>
        </div>

        @endif
    </div>
    <script type="text/javascript" src="{{ asset('js/smooth-scroll.polyfills.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/footer.js') }}"></script>
    <script>
        function sendVcard() {
        "use strict";
        var phone_number = $('#phone_number').val();
        window.open('https://api.whatsapp.com/send/?phone='+phone_number+'&text='+ `{{ $shareContent }}`, '_blank');
        return false;
    }
    </script>
</body>

</html>