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
                                        $total = 0;
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
                                        <td class="">Order total</td>
                                        <td class="text-end grand_total_set" colspan="3">
                                            {{ getPrice($total) }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            State Tax
                                        </td>
                                        <td class="text-end" data-th="Vat" colspan="3">
                                            @if (session()->has('tax'))
                                                {{ getPrice(session()->get('tax')) }}
                                            @endif
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            Shipping Cost
                                        </td>
                                        <td class="text-end" data-th="Shipping Cost" colspan="3">
                                            @if (session()->has('shippingCost'))
                                                {{ getPrice(session()->get('shippingCost')) }}
                                            @endif
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="text-lg text-primary">
                                            Grand Total
                                        </td>
                                        <td class="text-end text-lg text-primary" data-th="Grand Total" colspan="3">
                                            @if (session()->has('tax'))
                                                @php
                                                    
                                                    $total = (int) $total + (int) session()->get('tax');
                                                @endphp
                                            @endif
                                            @if (session()->has('shippingCost'))
                                                @php
                                                    
                                                    $total = (int) $total + (int) session()->get('shippingCost');
                                                @endphp
                                            @endif
                                            {{ getPrice($total) }}

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
                            <form action="#" method="post">
                                <div class="payment">
                                    <a href="#">
                                        <img class="img-fluid" src="{{ asset('assets/images/paypal.png') }}"
                                            alt="Paypal">
                                        <span>Paypal</span>
                                    </a>

                                    @if (isset($user->stripe_public_key) && isset($user->stripe_secret_key))
                                        <a
                                            href="{{ route('checkout.payment.stripe', ['cardUrl' => $business_card_details->card_url]) }}">
                                            <img class="img-fluid" src="{{ asset('assets/images/stripe.png') }}"
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

@endsection
