@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])
@section('store-nav', 'active')


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
                            {{ __('Product Order') }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <div class="col-sm-12 col-lg-12 d-none d-md-block">
                        <div class="card">
                            <div class="page-body">
                                <div class="container-xl">
                                    <div class="card card-lg">
                                        <div id="invoice">
                                            <div class="card-body">
                                                <div class="row">
                                                    @php

                                                        $shipping = json_decode($orders->shipping_details, true);
                                                        $billing = json_decode($orders->billing_details, true);
                                                    @endphp
                                                    <div class="col-6">
                                                        <address>

                                                            <h2>Shipping</h2>
                                                            <p><strong>First name :
                                                                </strong><span>{{ $shipping['ship_first_name'] ?? 'Not Available' }}</span>
                                                            </p>

                                                            <p><strong>Last name :
                                                                </strong><span>{{ $shipping['ship_last_name'] ?? 'Not Available' }}</span>
                                                            </p>

                                                            <p><strong>Email :
                                                                </strong><span>{{ $shipping['ship_email'] ?? 'Not Available' }}</span>
                                                            </p>

                                                            <p><strong>Phone :
                                                                </strong><span>{{ $shipping['ship_phone'] ?? 'Not Available' }}</span>
                                                            </p>

                                                            <p><strong>Address :
                                                                </strong><span>{{ $shipping['ship_address1'] ?? 'Not Available' }}</span>
                                                            </p>

                                                            <p><strong>City :
                                                                </strong><span>{{ $shipping['ship_city'] ?? 'Not Available' }}</span>
                                                            </p>

                                                            <p><strong>State :
                                                                </strong><span>{{ $shipping['ship_state'] ?? 'Not Available' }}</span>
                                                            </p>

                                                            <p><strong>Zip :
                                                                </strong><span>{{ $shipping['ship_zip'] ?? 'Not Available' }}</span>
                                                            </p>

                                                            <p><strong>Country :
                                                                </strong><span>{{ $shipping['ship_country'] ?? 'Not Available' }}</span>
                                                            </p>

                                                            <p><strong>Note :
                                                                </strong><span>{{ $shipping['order_note'] ?? 'Not Available' }}</span>
                                                            </p>


                                                        </address>
                                                    </div>
                                                    <div class="col-6">
                                                        <address class="text-end">
                                                            <h2>Billiing</h2>

                                                            <p><strong>First
                                                                    name:
                                                                </strong><span>{{ $billing['bill_first_name'] ?? 'Not Available' }}</span>
                                                            </p>
                                                            <p><strong>Last
                                                                    name:
                                                                </strong><span>{{ $billing['bill_last_name'] ?? 'Not Available' }}</span>
                                                            </p>
                                                            <p><strong>Email:
                                                                </strong><span>{{ $billing['bill_email'] ?? 'Not Available' }}</span>
                                                            </p>
                                                            <p><strong>Phone:
                                                                </strong><span>{{ $billing['bill_phone'] ?? 'Not Available' }}</span>
                                                            </p>
                                                            <p><strong>Address1:
                                                                </strong><span>{{ $billing['bill_address1'] ?? 'Not Available' }}</span>
                                                            </p>
                                                            <p><strong>City:
                                                                </strong><span>{{ $billing['bill_city'] ?? 'Not Available' }}</span>
                                                            </p>
                                                            <p><strong>State:
                                                                </strong><span>{{ $billing['bill_state'] ?? 'Not Available' }}</span>
                                                            </p>
                                                            <p><strong>Zip:
                                                                </strong><span>{{ $billing['bill_zip'] ?? 'Not Available' }}</span>
                                                            </p>
                                                            <p><strong>Country:
                                                                </strong><span>{{ $billing['bill_country'] ?? 'Not Available' }}</span>
                                                            </p>
                                                            <p><strong>Order Date :
                                                                </strong><span>{{ date('d-M-Y', strtotime($orders->order_date)) }}</span>
                                                            </p>
                                                        </address>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        @foreach ($orders->orderDetails as $orderDetails)
                                                            <tr>
                                                                <td>{{ $orderDetails->hasProduct->product_name }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    @include('user.includes.footer')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
