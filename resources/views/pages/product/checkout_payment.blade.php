@extends('pages.product.layouts.master')
@section('title', 'Checkout')

@section('content')

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
                                        $total = $tax = $shippingCost = $grand_total = $coupon_discount = 0;
                                    @endphp
                                    @if (session('cart'))
                                        @foreach (session('cart') as $id => $details)
                                            @php
                                                $total += $details['price'] * $details['quantity'];
                                                $line_total = $details['price'] * $details['quantity'];
                                            @endphp

                                            <tr class="align-middle" data-id="{{ $id }}">

                                                <td data-th="Product">
                                                    <span>{{ $details['product']['product_name'] }}</span>
                                                </td>
                                                <td data-th="Price">{{ getPrice($details['price']) }}</td>
                                                <td data-th="Quantity">
                                                    {{ $details['quantity'] }}
                                                </td>
                                                <td class="text-end" data-th="Subtotal">
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
                                        <td class="">Total</td>
                                        <td class="text-end grand_total_set" colspan="3">{{ getPrice($total) }}</td>
                                    </tr>

                                    <tr>
                                        <td>State Tax</td>
                                        <td class="text-end" data-th="Vat" colspan="3">
                                            @if (session()->has('tax'))
                                                @php $tax = session()->get('tax'); @endphp
                                                {{ getPrice($tax) }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Shipping Cost</td>
                                        <td class="text-end" data-th="Shipping Cost" colspan="3">
                                            @if (session()->has('shippingCost'))
                                                @php $shippingCost = session()->get('shippingCost'); @endphp
                                                {{ getPrice($shippingCost) }}
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-lg text-primary">Coupon Discount</td>
                                        <td colspan="2"></td>

                                        <td class="text-end text-lg  text-primary" id="cupponPrice">

                                            @if (session()->has('coupon'))

                                                @if (session('coupon')->type == 'amount')
                                                    @php $coupon_discount = session('coupon')->amount; @endphp
                                                @elseif (session('coupon')->type == 'percent')
                                                    @php $coupon_discount = ($total * session('coupon')->amount)/100; @endphp
                                                @endif

                                                - {{ getPrice($coupon_discount) }}
                                            @endif
                                    </tr>

                                    <tr>
                                        <td class="text-lg text-primary">Grand Total {{ $total }}</td>
                                        <td colspan="2"></td>
                                        <td class="text-end text-lg  text-primary">
                                            @php $grand_total = $total+$tax+$shippingCost-$coupon_discount;  @endphp
                                            <p> {{ getprice($grand_total) }}</p>

                                        </td>
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
                                    <li><a class="active"
                                            href="{{ route('checkout', ['cardUrl' => $business_card_details->card_url]) }}">Shipping
                                            Address <i class="fa fa-angle-right"></i></a></li>
                                    <li><a class="active"
                                            href="{{ route('checkout.billing', ['cardUrl' => $business_card_details->card_url]) }}">Billing
                                            Address <i class="fa fa-angle-right"></i></a></li>
                                    <li><a class="active"
                                            href="{{ route('checkout.payment', ['cardUrl' => $business_card_details->card_url]) }}">Payment</a>
                                    </li>
                                </ul>
                            </div>
                            @if (
                                (isset($user->paypal_public_key) && isset($user->paypal_secret_key)) ||
                                    (isset($user->stripe_public_key) && isset($user->stripe_secret_key)))
                                <form id="paymentMethodForm" action="#" method="post">
                                    <div class="payment">

                                        @if (isset($user->paypal_public_key) && isset($user->paypal_secret_key))
                                            <input id="paypal" name="paymentMethod" type="radio" value="PayPal">
                                            <label for="paypal">

                                                <img class="img-fluid" src="{{ asset('assets/images/paypal.png') }}"
                                                    alt="Paypal">
                                                <span>Paypal</span>

                                            </label>
                                        @endif
                                        @if (isset($user->stripe_public_key) && isset($user->stripe_secret_key))
                                            <input id="stripe" name="paymentMethod" type="radio" value="Stripe">
                                            <label for="stripe">
                                                {{-- <a href="javascript:void(0)"> --}}
                                                <img class="img-fluid" src="{{ asset('assets/images/stripe.png') }}"
                                                    alt="Stripe">
                                                <span>Stripe</span>
                                                {{-- </a> --}}
                                            </label>
                                        @endif
                                    </div>
                                    @if (
                                        (isset($user->paypal_public_key) && isset($user->paypal_secret_key)) ||
                                            (isset($user->stripe_public_key) && isset($user->stripe_secret_key)))
                                        <button class="btn btn-primary btn-sm mt-2" type="submit">
                                            <span class="hidden-xs-down">
                                                Continue
                                                <i class="fa fa-angle-right"></i>
                                            </span>
                                        </button>
                                    @endif

                                </form>
                            @else
                                <p class="text-center text-danger">No payment getway available</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="paypalPaymentFrom"
        action="{{ route('checkout.payment.paypal.store', ['cardUrl' => $business_card_details->card_url]) }}"
        method="POST">
        @csrf</form>

    <div class="modal modal-blur fade" id="stripeModal" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
        aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal modal-dialog-centered" role="document">

            <div class="modal-content rounded p-1">

                <div class="modal-body">

                    <h4 class="modal-title text-left" id="paymentStripeLabel"> {{ __('Card Information') }}</h4>

                    <div class="checkout">
                        @if (isset($paymentId))
                            <form id="payment-form"
                                action="{{ route('checkout.payment.stripe.store', ['paymentId' => $paymentId, 'cardUrl' => $business_card_details->card_url]) }}"
                                method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="card-header">
                                        <label for="card-element">
                                            {{ __('Please enter your credit card information') }}
                                        </label>

                                    </div>
                                    <div class="card-body mt-2">
                                        <div id="card-element">
                                            <!-- A Stripe Element will be inserted here. -->
                                        </div>
                                        <!-- Used to display form errors. -->
                                        <div id="card-errors" role="alert"></div>

                                    </div>
                                </div>

                                <button class="btn btn-dark mt-4 float-end" id="card-button"
                                    data-secret="{{ $intent }}" type="submit">
                                    {{ __('Pay Now') }} </button>

                            </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>
        $('#paymentMethodForm').submit(function(e) {
            e.preventDefault()
            let selectedPaymentMethod = $('input[name="paymentMethod"]:checked', "#paymentMethodForm").val();
            if (selectedPaymentMethod == "Stripe") {
                $("#stripeModal").modal('show');

            } else {

                $('#paypalPaymentFrom').submit();

            }
        })
    </script>
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
                $('#card-button').html(
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
                            $('#card-button').html("Pay Now").prop('disabled', false);

                        } else {
                            console.log(result);
                            form.submit();

                        }
                    });
            });


        })();
    </script>
@endpush
