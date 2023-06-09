@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])

@section('content')
    <div class="page-wrapper">
        <div class="container-xl">
            <!-- Page title -->
            <div class="page-header d-print-none">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="page-pretitle">
                            {{ __('Overview') }}
                        </div>
                        <h2 class="page-title">
                            {{ __('Checkout') }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-xl mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ $plan_details->plan_name }}</h3>
                        <div class="card col-12">
                            <form id="payment-form" action="{{ route('stripe.payment.status', $paymentId) }}"
                                method="post">
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
                                        <input name="plan" type="hidden" value="" />
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-dark" id="card-button" data-secret="{{ $intent }}"
                                        type="submit"> {{ __('Pay Now') }} </button>
                                </div>
                            </form>
                        </div>

                        <br>
                        <a class="mt-2 text-muted text-underline"
                            href="{{ route('stripe.payment.cancel', $paymentId) }}">{{ __('Cancel payment and back to home') }}</a>

                        </p>
                    </div>
                </div>
            </div>
        </div>
        @include('user.includes.footer')

    </div>
@endsection

@push('script')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        ! function() {
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

            const stripe = Stripe('{{ $config[9]->config_value }}', {
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


        }();
    </script>
@endpush
