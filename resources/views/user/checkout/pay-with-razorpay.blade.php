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
                        <h3 class="card-title">{{ __('Choosed Plan') }} : {{ __($plan_details->plan_name) }}</h3>
                        <button class="btn btn-primary" id="rzp-button1">{{ __('Pay Now') }}</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @include('user.includes.footer')
        @push('script')
            <script type="text/javascript" src="{{ asset('js/razorpay-checkout.js') }}"></script>
            <script>
                ! function() {
                    "use strict";
                    var options = {
                        "key": "{{ $config[6]->config_value }}",
                        "amount": "{{ $order->amount }}",
                        "currency": "{{ $order->currency }}",
                        "name": "{{ env('APP_NAME') }}",
                        "description": "Upgrade Package",
                        "image": "{{ $settings->site_logo }}",
                        "order_id": "{{ $order->id }}",
                        "handler": function(response) {
                            window.location = "../razorpay-payment-status/" + response.razorpay_order_id + "/" + response
                                .razorpay_payment_id;
                        },
                        "prefill": {
                            "name": "{{ Auth::user()->name }}",
                            "email": "{{ Auth::user()->email }}",
                            "contact": ""
                        },
                        "notes": {
                            "gobiz_transaction_id": "{{ $gobiz_transaction_id }}"
                        },
                        "theme": {
                            "color": "#613BBB"
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.on('payment.failed',
                        function(response) {
                            window.location = "../razorpay-payment-status/" + response.error.metadata.order_id + "/" + response
                                .error
                                .metadata.payment_id;
                        });
                    document.getElementById('rzp-button1').onclick = function(e) {
                        rzp1.open();
                        e.preventDefault();
                    }
                }();
            </script>
        @endpush
    </div>
@endsection
