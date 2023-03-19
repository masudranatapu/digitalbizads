<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My Cart</title>

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



    <div class="cart_page mt-5 mb-5">
        <div class="container">
            <div class="heading mb-4">
                <h3>Cart</h3>
            </div>
            <div id="view_cart_load">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="table-responsive shopping-cart">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="10%">Image</th>
                                        <th width="25%">Product Name</th>
                                        <th width="10%">Product Price</th>
                                        <th width="10%">Quantity</th>
                                        <th width="10%">Subtotal</th>
                                        <th width="10%">
                                            <a class="btn btn-sm btn-primary" href="#">
                                                <span>Clear Cart</span>
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="cart_view_load">
                                    @foreach ($cart as $cartItem)
                                        <tr>
                                            <td>
                                                <a href="#" target="_blank">
                                                    <img src="{{ getPhoto($cartItem['image']) }}" width="80"
                                                        alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <h6>
                                                    <a href="#" target="_blank">
                                                        {{ $cartItem['name'] }}</a>
                                                </h6>
                                            </td>
                                            <td>
                                                {{ $cartItem['price'] }}
                                            </td>
                                            <td class="quantify_btn">
                                                <div class="input-group">
                                                    <span class="input-type-text"><i class="fa fa-minus"></i></span>
                                                    <input type="number" class="form-control" name="qty"
                                                        id="qty" value="1" min="1" max="100"
                                                        readonly>
                                                    <span class="input-type-text"><i class="fa fa-plus"></i></span>
                                                </div>
                                            </td>
                                            <td>
                                                $100.00
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-danger"><i
                                                        class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="card shopping_btn">
                    <div class="card-body">
                        <div class="text-center">
                            <h4>Subtotal: $340.00</h4>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="button">
                                <a href="#" class="btn btn-primary"><i class="fa fa-angle-left"></i> Back to
                                    Shopping</a>
                            </div>
                            <div class="button">
                                <a href="{{ route('checkout') }}" class="btn btn-success">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
