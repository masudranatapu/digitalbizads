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

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    <style>
        .cart {
            display: block;
            width: 1.5rem;
        }
    </style>
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
                                    <li><a href="{{ route('checkout', ['card_id' => $business_card_details->card_id]) }}"
                                            class="active">Shipping Address <i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{ route('checkout.billing', ['card_id' => $business_card_details->card_id]) }}"
                                            class="active">Billing Address <i class="fa fa-angle-right"></i></a></li>
                                    <li><a
                                            href="{{ route('checkout.payment', ['card_id' => $business_card_details->card_id]) }}">Payment</a>
                                    </li>
                                </ul>
                            </div>
                            <form
                                action="{{ route('checkout.billing.store', ['card_id' => $business_card_details->card_id]) }}"
                                method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label for="bill_first_name" class="form-label">First Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('bill_first_name') border-danger @enderror"
                                                name="bill_first_name" required="" id="bill_first_name"
                                                value="@if (old('bill_first_name')) {{ old('bill_first_name') }}@elseif(session()->has('billing')){{ session('billing')['bill_first_name'] }} @endif"
                                                placeholder="First Name">
                                            @error('bill_first_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label for="bill_last_name" class="form-label">Last Name <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('bill_last_name') border-danger @enderror"
                                                name="bill_last_name" required="" type="text" id="bill_last_name"
                                                value="@if (old('bill_last_name')) {{ old('bill_last_name') }}@elseif(session()->has('billing')){{ session('billing')['bill_last_name'] }} @endif"
                                                placeholder="Last Name">
                                            @error('bill_last_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label for="bill_email" class="form-label">E-mail Address <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('bill_email') border-danger @enderror"
                                                name="bill_email" required="" type="email" id="bill_email"
                                                value="@if (old('bill_email')) {{ old('bill_email') }}@elseif(session()->has('billing')){{ session('billing')['bill_email'] }} @endif"
                                                placeholder="E-mail Address">
                                            @error('bill_email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label for="bill_phone" class="form-label">Phone Number <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('bill_phone') border-danger @enderror"
                                                name="bill_phone" required="" type="text" id="bill_phone"
                                                value="@if (old('bill_phone')) {{ old('bill_phone') }}@elseif(session()->has('billing')){{ session('billing')['bill_phone'] }} @endif"
                                                placeholder="Phone Number">
                                            @error('bill_phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label for="bill_address1" class="form-label">Address <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('bill_address1') border-danger @enderror"
                                                name="bill_address1" required="" type="text"
                                                id="bill_address1"
                                                value="@if (old('bill_address1')) {{ old('bill_address1') }}@elseif(session()->has('billing')){{ session('billing')['bill_address1'] }} @endif"
                                                placeholder="Address">
                                            @error('bill_address1')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label for="bill_city" class="form-label">City <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('bill_city') border-danger @enderror"
                                                name="bill_city" required="" type="text" id="bill_city"
                                                value="@if (old('bill_city')) {{ old('bill_city') }}@elseif(session()->has('billing')){{ session('billing')['bill_city'] }} @endif"
                                                placeholder="City">
                                            @error('bill_city')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label for="bill_state" class="form-label">State <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('bill_state') border-danger @enderror"
                                                name="bill_state" required="" type="text" id="bill_state"
                                                value="@if (old('bill_state')) {{ old('bill_state') }}@elseif(session()->has('billing')){{ session('billing')['bill_state'] }} @endif"
                                                placeholder="State">
                                            @error('bill_state')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label for="bill_zip" class="form-label">Zip Code <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('bill_zip') border-danger @enderror"
                                                name="bill_zip" type="text" required="" id="bill_zip"
                                                value="@if (old('bill_zip')) {{ old('bill_zip') }}@elseif(session()->has('billing')){{ session('billing')['bill_zip'] }} @endif"
                                                placeholder="Zip Code">
                                            @error('bill_zip')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label for="bill_country" class="form-label">Country <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('bill_country') border-danger @enderror"
                                                name="bill_country" type="text" required="" id="bill_country"
                                                value="@if (old('bill_country')) {{ old('bill_country') }}@elseif(session()->has('billing')){{ session('billing')['bill_country'] }} @endif"
                                                placeholder="Country">
                                            @error('bill_country')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="d-flex justify-content-between paddin-top-1x">
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('cart', ['card_id' => $business_card_details->card_id]) }}">
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






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
