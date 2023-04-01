<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if (isset($setting) && $setting)
        {!! SEOMeta::generate() !!}
        {!! OpenGraph::generate() !!}
        {!! Twitter::generate() !!}
        {!! JsonLd::generate() !!}
    @endif

    @if (isset($title) && $title)
        <title>{{ $title }}</title>
    @endif

    @if (isset($setting) && $setting)
        <meta name="google-site-verification" content="{{ $settings->google_key }}">
        <link type="image/png" href="{{ url('/') }}{{ $settings->favicon }}" rel="icon" sizes="96x96" />
    @endif

    {!! htmlScriptTagJsApi() !!}

    <!-- CSS files -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('frontend/css/tailwind.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sweetalert.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet" />
    <script type="text/javascript" src="{{ asset('js/alpine.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/sweetalert.min.js') }}"></script>
    @if (isset($setting) && $setting)

        {{-- Check Google Analytics is "enabled" --}}
        @if (!empty($settings->google_analytics_id))
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id={{ $settings->google_analytics_id }}"></script>
            <script>
                window.dataLayer = window.dataLayer || [];

                function gtag() {
                    dataLayer.push(arguments);
                }
                gtag('js', new Date());

                gtag('config', '{{ $settings->google_analytics_id }}');
            </script>
        @endif
    @endif
    @yield('custom-script')
</head>

<body class="antialiased bg-body text-body font-body"
    dir="{{ App::isLocale('ar') || App::isLocale('ur') || App::isLocale('he') ? 'rtl' : 'ltr' }}">
    <div>
        @if (isset($nav) && $nav)
            @include('web.nav')
        @endif
        @yield('content')

        @if (env('COOKIE_CONSENT_ENABLED') == true)
            @include('cookieConsent::index')
        @endif
    </div>

    @if (isset($footer) && $footer)
        @include('web.footer')
    @endif

    <!-- Smooth Scroll -->
    <script type="text/javascript" src="{{ asset('js/smooth-scroll.polyfills.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/footer.js') }}"></script>

    @if (isset($settings) && $settings)
        @if ($settings->tawk_chat_bot_key != null)
            <!--Start of Tawk.to Script-->
            <script>
                (function($) {
                    "use strict";
                    var Tawk_API = Tawk_API || {},
                        Tawk_LoadStart = new Date();
                    var s1 = document.createElement("script"),
                        s0 = document.getElementsByTagName("script")[0];
                    s1.async = true;
                    s1.src = 'https://embed.tawk.to/{{ $settings->tawk_chat_bot_key }}';
                    s1.charset = 'UTF-8';
                    s1.setAttribute('crossorigin', '*');
                    s0.parentNode.insertBefore(s1, s0);
                })(jQuery);
            </script>
            <!--End of Tawk.to Script-->
        @endif
    @endif
    @include('sweet::alert')

    <script src="{{ asset('frontend/whatsapp-store/js/script.js') }}"></script>

    @stack('script')
</body>

</html>
