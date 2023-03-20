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
                <a href="{{ route('cart', ['card_id' => $business_card_details->card_id]) }}" class="nav-link">
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
                        <div class="widget widget-featured-posts widget-order-summary p-4">
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
                                    @endif`
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
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Payment</h3>
                                <div class="card col-12">
                                    <form action="{{}}" method="post" id="payment-form">
                                        @csrf

                                        <div class="form-group">
                                            <div class="card-header">
                                                <label for="card-element">
                                                    {{ __('Please enter your credit card information') }}
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div id="card-element">
                                                    <!-- A Stripe Element will be inserted here. -->
                                                </div>
                                                <!-- Used to display form errors. -->
                                                <div id="card-errors" role="alert"></div>
                                                <input type="hidden" name="plan" value="" />
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button id="card-button" class="btn btn-dark" type="submit"
                                                data-secret="{{ $intent }}"> {{ __('Pay Now') }} </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>








    <script src="https://js.stripe.com/v3/"></script>
    <script>
        (function() {
            "use strict";
            var style = {
                base: {
                    color: '#32325d',
                    lineHeight: '18px',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

            const stripe = Stripe('{{ $user->stripe_public_key }}', {
                locale: 'en'
            }); // Create a Stripe client.
            const elements = stripe.elements(); // Create an instance of Elements.
            const cardElement = elements.create('card', {
                style: style
            }); // Create an instance of the card Element.
            const cardButton = document.getElementById('card-button');
            const clientSecret = cardButton.dataset.secret;

            cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.

            // Handle real-time validation errors from the card Element.
            cardElement.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            // Handle form submission.
            var form = document.getElementById('payment-form');

            form.addEventListener('submit', function(event) {
                event.preventDefault();
                $('.card-footer button').html(
                    '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>'
                ).prop('disabled', true);

                stripe.handleCardPayment(clientSecret, cardElement, {
                        payment_method_data: {
                            //billing_details: { name: cardHolderName.value }
                        }
                    })
                    .then(function(result) {
                        console.log(result);
                        if (result.error) {
                            // Inform the user if there was an error.
                            var errorElement = document.getElementById('card-errors');
                            errorElement.textContent = result.error.message;
                            $('.card-footer button').html("Pay Now").prop('disabled', false);

                        } else {
                            console.log(result);
                            form.submit();

                        }
                    });
            });


        })();
    </script>

</body>

</html>
