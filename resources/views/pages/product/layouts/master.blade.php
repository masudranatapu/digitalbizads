<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <meta property="og:title" content="{{ $business_card_details->title ?? '' }}" />
    <meta property="og:description" content="{{ $business_card_details->sub_title ?? '' }}" />

    @php
        $settings = getSetting();
    @endphp
    @if ($business_card_details->profile)
        <link type="image/png" href="{{ url('/') }}{{ $business_card_details->profile }}" rel="icon"
            sizes="96x96" />
    @else
        <link type="image/png" href="{{ url('/') }}{{ $settings->favicon }}" rel="icon" sizes="96x96" />
    @endif

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400&display=swap"
        rel="stylesheet">
    <script src="{{ asset('frontend/whatsapp-store/js/main.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    @stack('css')
    <style>
        .cart {
            display: block;
            width: 1.5rem;
        }
    </style>
</head>

<body class="antialiased bg-body text-body font-body bg-body"
    dir="{{ App::isLocale('ar') || App::isLocale('ur') || App::isLocale('he') ? 'rtl' : 'ltr' }}">

    @include('pages.product.includes.nav')

    @yield('content')

    {{-- footer --}}
    <footer class="footer">
        <div class="social_share">
            <div class="container-fluid">
                <div class="title">
                    <h4>Share on</h4>
                </div>
            </div>
        </div>

        <div class="container-fluid">

            <div class="social_list ps-3">
                <ul>
                    <li>
                        <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
                    </li>
                    <li>
                        <a href="#" target="_blank"><i class="fab fa-telegram"></i></a>
                    </li>
                    <li>
                        <a href="#" target="_blank"><i class="fab fa-whatsapp"></i></a>
                    </li>
                </ul>
            </div>

            <div class="copyright mt-5 pb-3 text-center">
                <p>Copyright © Big Store .</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/whatsapp-store/js/script.js') }}"></script>
    @stack('script')
    @if (session()->has('success'))
        <script>
            successAlert("{{ session()->get('success') }}");
        </script>
    @endif
    @if (session()->has('alert'))
        <script>
            errorAlert("{{ session()->geT('alert') }}");
        </script>
    @endif

</body>

</html>
