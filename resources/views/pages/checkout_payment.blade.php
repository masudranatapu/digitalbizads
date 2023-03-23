<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Checkout</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400&display=swap">
    <script src="{{ asset('frontend/whatsapp-store/js/main.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style>
        .cart {
            display: block;
            width: 1.5rem;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
</head>

<body class="antialiased bg-body text-body font-body"
    dir="{{ App::isLocale('ar') || App::isLocale('ur') || App::isLocale('he') ? 'rtl' : 'ltr' }}">

    <section>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm bg-body-tertiary py-4 px-2"
            style="@if ($business_card_details->header_backgroung) background-color: {{ $business_card_details->header_backgroung }} @endif; @if ($business_card_details->header_text_color) color: {{ $business_card_details->header_text_color }} @endif">
            <div class="container-fluid d-flex justify-content-between">
                <div @if ($business_card_details->header_text_color) color: {{ $business_card_details->header_text_color }} @endif>
                    <a class="navbar-brand" href="{{ route('card.preview', $business_card_details->card_url) }}">
                        @if ($business_card_details->profile)
                            <img src="{{ url('/') }}{{ $business_card_details->profile }}"
                                alt="{{ $business_card_details->title }}" width="40px">
                        @else
                            {{ $business_card_details->title }}
                        @endif
                    </a>
                </div>
                <a href="{{ route('cart') }}" class="nav-link">
                    <span class="cart">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="@if ($business_card_details->header_text_color) {{ $business_card_details->header_text_color }} @else #000000 @endif ">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </span>
                </a>
            </div>
        </nav>
    </section>


    <div class="checkout_page mt-5 mb-5">
        <div class="container">
            <div class="heading mb-4">
                <h3>Checkout</h3>
            </div>
            <div class="row g-3">
                <div class="col-lg-5 order-lg-2">
                    <div class="card_summary">
                        <div class="card widget widget-featured-posts widget-order-summary p-4">
                            <h3 class="widget-title">Order Summary</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @if (session('cart'))
                                        @foreach (session('cart') as $id => $details)
                                            @php
                                                $total += $details['price'] * $details['quantity'];
                                                $line_total = $details['price'] * $details['quantity'];
                                            @endphp

                                            <tr data-id="{{ $id }}" class="align-middle">

                                                <td data-th="Product">
                                                    <span>{{ $details['name'] }}</span>
                                                </td>
                                                <td data-th="Price">{{ getPrice($details['price']) }}</td>
                                                <td data-th="Quantity">
                                                    {{ $details['quantity'] }}
                                                </td>
                                                <td data-th="Subtotal" class="text-center">
                                                    {{ getPrice($line_total) }}
                                                </td>

                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="text-center text-danger" colspan="5">
                                                <h4>No product available in the cart</h4>

                                            </td>
                                        </tr>
                                    @endif


                                    {{-- <tr class=" set__state_price_tr">
                                        <td>State tax:</td>
                                        <td class="text-gray-dark set__state_price">$23.80</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping:</td>
                                        <td class="text-gray-dark">$0.00</td>
                                    </tr> --}}
                                    <tr>
                                        <td class="text-lg text-primary">Order total</td>
                                        <td colspan="3" class="text-lg text-end text-primary grand_total_set">
                                            {{ getPrice($total) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 order-lg-1">
                    <div class="checkout">
                        <div class="checkout_form">
                            <div class="checkout_step mb-4">
                                <ul>
                                    <li><a href="{{ route('checkout') }}"
                                            class="active">Shipping Address <i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{ route('checkout.billing') }}"
                                            class="active">Billing Address <i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{ route('checkout.payment') }}"
                                            class="active">Payment</a></li>
                                </ul>
                            </div>
                            <form action="#" method="post">
                                <div class="payment">
                                    <a href="#">
                                        <img src="{{ asset('assets/images/paypal.png') }}" class="img-fluid"
                                            alt="Paypal">
                                        <span>Paypal</span>
                                    </a>

                                    @if (isset($user->stripe_public_key) && isset($user->stripe_secret_key))
                                        <a
                                            href="{{ route('checkout.payment.stripe') }}">
                                            <img src="{{ asset('assets/images/stripe.png') }}" class="img-fluid"
                                                alt="Stripe">
                                            <span>Stripe</span>
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/whatsapp-store/js/script.js') }}"></script>

</body>

</html>
