@extends('pages.product.layouts.master')
@section('title', 'Shipping Address')
@section('content')
    <div class="checkout_page mt-5 mb-5">
        <div class="container">
            <div class="heading mb-4">
                <h3>Shipping Address</h3>
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
                                        $grandTotal = 0;
                                        
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
                                                <td class="text-center" data-th="Quantity">
                                                    {{ $details['quantity'] }}
                                                </td>
                                                <td class="text-center" data-th="Subtotal">
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
                                        <td colspan="2"></td>
                                        <td class="text-lg text-center text-primary grand_total_set">
                                            {{ getPrice($total) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-lg text-primary">Coupon Discount</td>
                                        <td colspan="2"></td>

                                        <td class="text-center text-lg  text-primary" id="cupponPrice">

                                            @if (session()->has('coupon'))
                                                @if (session('coupon')->type == 'amount')
                                                    - {{ getPrice(session('coupon')->amount) }}
                                                @elseif (session('coupon')->type == 'percent')
                                                    - {{ getPrice(($total * session('coupon')->amount) / 100) }}
                                                @endif
                                            @endif
                                    </tr>
                                    <tr>
                                        <td class="text-lg text-primary">Grand Total</td>
                                        <td colspan="2"></td>
                                        <td class="text-center text-lg  text-primary">

                                            @if (session()->has('coupon'))
                                                @if (session('coupon')->type == 'amount')
                                                    <p>{{ getprice($total - session('coupon')->amount) }}</p>
                                                @elseif (session('coupon')->type == 'percent')
                                                    <p>
                                                        <strong>{{ getprice($total - ($total * session('coupon')->amount) / 100) }}
                                                        </strong><span>
                                                            (-{{ session('coupon')->amount }}%)
                                                        </span>
                                                    </p>
                                                @else
                                                    <p>
                                                        {{ getprice($total) }}
                                                    </p>
                                                @endif
                                            @else
                                                <p>
                                                    {{ getprice($total) }}
                                                </p>
                                            @endif

                                        </td>
                                    </tr>
                                    </td>
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
                                    <li><a
                                            href="{{ route('checkout.billing', ['cardUrl' => $business_card_details->card_url]) }}">Billing
                                            Address <i class="fa fa-angle-right"></i></a></li>
                                    <li><a
                                            href="{{ route('checkout.payment', ['cardUrl' => $business_card_details->card_url]) }}">Payment</a>
                                    </li>
                                </ul>
                            </div>
                            <form action="{{ route('checkout.store', ['cardUrl' => $business_card_details->card_url]) }}"
                                method="post">

                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="ship_first_name">First Name <span
                                                    class="text-danger">*</span></label>

                                            <input class="form-control @error('ship_first_name') border-danger @enderror"
                                                id="ship_first_name" name="ship_first_name" type="text"
                                                value="@if (old('ship_first_name')) {{ old('ship_first_name') }}
                                                @elseif(session()->has('shipping')){{ session('shipping')['ship_first_name'] }} @endif"
                                                required="" placeholder="First Name">
                                            @error('ship_first_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="ship_last_name">Last Name <span
                                                    class="text-danger">*</span></label>

                                            <input class="form-control @error('ship_last_name') border-danger @enderror"
                                                id="ship_last_name" name="ship_last_name" type="text"
                                                value="@if (old('ship_last_name')) {{ old('ship_last_name') }}
                                                @elseif(session()->has('shipping')){{ session('shipping')['ship_last_name'] }} @endif"
                                                required="" placeholder="Last Name">
                                            @error('ship_last_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="ship_email">E-mail Address <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('ship_email') border-danger @enderror"
                                                id="ship_email" name="ship_email" type="email"
                                                value="@if (old('ship_email')) {{ old('ship_email') }}
                                                @elseif(session()->has('shipping')){{ session('shipping')['ship_email'] }} @endif"
                                                required="" placeholder="E-mail Address">
                                            @error('ship_email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="ship_phone">Phone Number <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('ship_phone') border-danger @enderror"
                                                id="ship_phone" name="ship_phone" type="text"
                                                value="@if (old('ship_phone')) {{ old('ship_phone') }}
                                                @elseif(session()->has('shipping')){{ session('shipping')['ship_phone'] }} @endif"
                                                required="" placeholder="Phone Number"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                            @error('ship_phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="ship_address1">Address <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('ship_address1') border-danger @enderror"
                                                id="ship_address1" name="ship_address1" type="text"
                                                value="@if (old('ship_address1')) {{ old('ship_address1') }}
                                                @elseif(session()->has('shipping')){{ session('shipping')['ship_address1'] }} @endif"
                                                required="" placeholder="Address">
                                            @error('ship_address1')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="ship_city">City <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('ship_city') border-danger @enderror"
                                                id="ship_city" name="ship_city" type="text"
                                                value="@if (old('ship_city')) {{ old('ship_city') }}
                                                @elseif(session()->has('shipping')){{ session('shipping')['ship_city'] }} @endif"
                                                required="" placeholder="City">
                                            @error('ship_city')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="ship_state">State <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control @error('ship_state') border-danger @enderror"
                                                id="ship_state" name="ship_state" required="">

                                                <option class="d-none" value="">Select State</option>
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}"
                                                        @if (old('ship_state')) {{ old('ship_state') == $state->id ? 'selected' : '' }}
                                                        @elseif(session()->has('shipping')){{ session('shipping')['ship_state'] == $state->id ? 'selected' : '' }} @endif>
                                                        {{ $state->name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            @error('ship_state')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="ship_zip">Zip Code <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('ship_zip') border-danger @enderror"
                                                id="ship_zip" name="ship_zip" type="text"
                                                value="@if (old('ship_zip')) {{ old('ship_zip') }}
                                                @elseif(session()->has('shipping')){{ session('shipping')['ship_zip'] }} @endif"
                                                required="" placeholder="Zip Code">
                                            @error('ship_zip')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="ship_state">Shiping Area<span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control @error('ship_area') border-danger @enderror"
                                                id="ship_area" name="ship_area" required="">

                                                <option class="d-none" value="">Select area</option>
                                                @foreach ($shippingAreas as $shippingArea)
                                                    <option value="{{ $shippingArea->id }}"
                                                        @if (old('ship_area')) {{ old('ship_area') == $shippingArea->id ? 'selected' : '' }}
                                                        @elseif(session()->has('shipping')){{ session('shipping')['ship_area'] == $shippingArea->id ? 'selected' : '' }} @endif>
                                                        {{ $shippingArea->name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            @error('ship_area')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="order_note">Order notes
                                                (optional)</label>
                                            <textarea class="form-control @error('order_note') border-danger @enderror" id="order_note" name="order_note"
                                                placeholder="Order Notes">
@if (old('order_note'))
{{ old('order_note') }}
@elseif(session()->has('shipping'))
{{ session('shipping')['order_note'] }}
@endif
</textarea>
                                            @error('order_note')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" id="same_as_shipping"
                                                    name="same_as_shipping" type="checkbox"
                                                    @if (session()->has('shipping')) {{ session('shipping')['same_as_shipping'] ? 'checked' : '' }} @endif>
                                                <label class="form-check-label" for="same_as_shipping">
                                                    Billing address is same as shipping address.
                                                </label>
                                            </div>
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

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/whatsapp-store/js/script.js') }}"></script>
    @if (session()->has('success'))
        <script>
            successAlert("{{ session()->get('success') }}");
        </script>
    @endif
    @if (session()->has('alert'))
        <script>
            successAlert("{{ session()->geT('alert') }}");
        </script>
    @endif
@endpush
