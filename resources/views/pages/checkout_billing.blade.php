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
</head>

<body class="antialiased bg-body text-body font-body"
    dir="{{ App::isLocale('ar') || App::isLocale('ur') || App::isLocale('he') ? 'rtl' : 'ltr' }}">




    <div class="checkout_page mt-5 mb-5">
        <div class="container">
            <div class="heading mb-4">
                <h3>Checkout</h3>
            </div>
            <div class="row g-3">
                <div class="col-lg-4 order-lg-2">
                    <div class="card_summary">
                        <div class="card widget widget-featured-posts widget-order-summary p-4">
                            <h3 class="widget-title">Order Summary</h3>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Cart Subtotal:</td>
                                        <td class="text-gray-dark">$340.00</td>
                                    </tr>
                                    <tr class=" set__state_price_tr">
                                        <td>State tax:</td>
                                        <td class="text-gray-dark set__state_price">$23.80</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping:</td>
                                        <td class="text-gray-dark">$0.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-lg text-primary">Order total</td>
                                        <td class="text-lg text-primary grand_total_set">$363.80</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 order-lg-1">
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
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label for="ship_first_name" class="form-label">First Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="ship_first_name"
                                                required="" id="ship_first_name" value=""
                                                placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label for="ship_last_name" class="form-label">Last Name <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" name="ship_last_name" required=""
                                                type="text" id="ship_last_name" value=""
                                                placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label for="ship_email" class="form-label">E-mail Address <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" name="ship_email" required="" type="email"
                                                id="ship_email" value="" placeholder="E-mail Address">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label for="ship_phone" class="form-label">Phone Number <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" name="ship_phone" required="" type="text"
                                                id="ship_phone" value="" placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label for="ship_address1" class="form-label">Address <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" name="ship_address1" required=""
                                                type="text" id="ship_address1" value=""
                                                placeholder="Address">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label for="ship_city" class="form-label">City <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" name="ship_city" required=""
                                                type="text" id="ship_city" value="" placeholder="City">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label for="ship_state" class="form-label">State <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" name="ship_state" required=""
                                                type="text" id="ship_state" value="" placeholder="State">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label for="ship_zip" class="form-label">Zip Code <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" name="ship_zip" type="text"
                                                required="" id="ship_zip" value="" placeholder="Zip Code">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label for="ship_country" class="form-label">Country <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" name="ship_country" type="text"
                                                required="" id="ship_country" value=""
                                                placeholder="Country">
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

                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('checkout.payment', ['card_id' => $business_card_details->card_id]) }}">
                                            <span class="hidden-xs-down">
                                                Continue
                                                <i class="fa fa-angle-right"></i>
                                            </span>
                                        </a>
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
