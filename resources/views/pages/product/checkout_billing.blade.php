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
                                    <li><a
                                            href="{{ route('checkout.payment', ['cardUrl' => $business_card_details->card_url]) }}">Payment</a>
                                    </li>
                                </ul>
                            </div>
                            <form
                                action="{{ route('checkout.billing.store', ['cardUrl' => $business_card_details->card_url]) }}"
                                method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="bill_first_name">First Name <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('bill_first_name') border-danger @enderror"
                                                id="bill_first_name" name="bill_first_name" type="text"
                                                value="@if (old('bill_first_name')) {{ old('bill_first_name') }}@elseif(session()->has('billing')){{ session('billing')['bill_first_name'] }} @endif"
                                                required="" placeholder="First Name">
                                            @error('bill_first_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="bill_last_name">Last Name <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('bill_last_name') border-danger @enderror"
                                                id="bill_last_name" name="bill_last_name" type="text"
                                                value="@if (old('bill_last_name')) {{ old('bill_last_name') }}@elseif(session()->has('billing')){{ session('billing')['bill_last_name'] }} @endif"
                                                required="" placeholder="Last Name">
                                            @error('bill_last_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="bill_email">E-mail Address <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('bill_email') border-danger @enderror"
                                                id="bill_email" name="bill_email" type="email"
                                                value="@if (old('bill_email')) {{ old('bill_email') }}@elseif(session()->has('billing')){{ session('billing')['bill_email'] }} @endif"
                                                required="" placeholder="E-mail Address">
                                            @error('bill_email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="bill_phone">Phone Number <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('bill_phone') border-danger @enderror"
                                                id="bill_phone" name="bill_phone" type="text"
                                                value="@if (old('bill_phone')) {{ old('bill_phone') }}@elseif(session()->has('billing')){{ session('billing')['bill_phone'] }} @endif"
                                                required="" placeholder="Phone Number"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                            @error('bill_phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="bill_address1">Address <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('bill_address1') border-danger @enderror"
                                                id="bill_address1" name="bill_address1" type="text"
                                                value="@if (old('bill_address1')) {{ old('bill_address1') }}@elseif(session()->has('billing')){{ session('billing')['bill_address1'] }} @endif"
                                                required="" placeholder="Address">
                                            @error('bill_address1')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="bill_city">City <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('bill_city') border-danger @enderror"
                                                id="bill_city" name="bill_city" type="text"
                                                value="@if (old('bill_city')) {{ old('bill_city') }}@elseif(session()->has('billing')){{ session('billing')['bill_city'] }} @endif"
                                                required="" placeholder="City">
                                            @error('bill_city')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="bill_state">State <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('bill_state') border-danger @enderror"
                                                id="bill_state" name="bill_state" type="text"
                                                value="@if (old('bill_state')) {{ old('bill_state') }}@elseif(session()->has('billing')){{ session('billing')['bill_state'] }} @endif"
                                                required="" placeholder="State">
                                            @error('bill_state')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="bill_zip">Zip Code <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('bill_zip') border-danger @enderror"
                                                id="bill_zip" name="bill_zip" type="text"
                                                value="@if (old('bill_zip')) {{ old('bill_zip') }}@elseif(session()->has('billing')){{ session('billing')['bill_zip'] }} @endif"
                                                required="" placeholder="Zip Code">
                                            @error('bill_zip')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between paddin-top-1x">
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('cart', ['cardUrl' => $business_card_details->card_url]) }}">
                                            <span class="hidden-xs-down">
                                                <i class="fa fa-angle-left"></i>
                                                Back To Cart
                                            </span>
                                        </a>

                                        <button class="btn btn-primary btn-sm" type="submit">
                                            <span class="hidden-xs-down">
                                                Continue
                                                <i class="fa fa-angle-right"></i>
                                            </span>
                                        </button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
