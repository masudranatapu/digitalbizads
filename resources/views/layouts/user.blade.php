<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @php
        $settings = DB::table('settings')->first();
    @endphp

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $settings->site_name }}</title>

    <link type="image/png" href="{{ $settings->favicon }}" rel="icon" sizes="96x96" />

    <!-- CSS files -->
    <link href="{{ asset('backend/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/demo.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/fontawesome-iconpicker.min.css') }}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/chart.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/sweetalert.min.js') }}"></script>
    @stack('css')
    <input id="base_url" name="base_url" type="hidden" value="{{ url('/') }}">

</head>

<body class="antialiased"
    dir="{{ App::isLocale('ar') || App::isLocale('ur') || App::isLocale('he') ? 'rtl' : 'ltr' }}">

    {{-- Preloader --}}
    <div class="preloader-wrapper">
        <div class="preloader">
            <img src="{{ asset('preloader.gif') }}" alt="{{ config('app.name') }}">
        </div>
    </div>

    <div id="wrapper">
        @if (isset($header) && $header)
            @include('user.includes.header')
        @endif
        @if (isset($nav) && $nav)
            @include('user.includes.nav')
        @endif
        @yield('content')
    </div>

    @include('sweet::alert')
    <!-- Tabler Core -->
    <script type="text/javascript" src="{{ asset('backend/js/tabler.min.js') }}"></script>
    @if (isset($demo) && $demo)
        <script type="text/javascript" src="{{ asset('backend/js/user-delete-query.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/datatable.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/js/jquery-qrcode.min.js') }}"></script>
    @endif
    {{-- Preloader --}}
    <script>
        $(document).ready(function() {
            "use strict";
            $('.preloader-wrapper').fadeOut();
        });
    </script>

    @stack('script')
</body>

</html>
