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
    <style>
        .cart {
            display: block;
            width: 1.5rem;
        }
    </style>
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
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

    <div class="cart_page mt-5 mb-5">
        <div class="container">
            <div class="heading mb-4">
                <h3>Cart</h3>
            </div>
            <div id="view_cart_load">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="table-responsive shopping-cart">
                            <div class="table-responsive">
                                <table id="cart" class="table table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th style="width:10%">Photo</th>
                                            <th style="width:35%">Product</th>
                                            <th style="width:15%">Price</th>
                                            <th style="width:15%">Quantity</th>
                                            <th style="width:20%" class="text-center">Subtotal</th>
                                            <th style="width:10%">Remove</th>
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
                                                    <td data-th="Photo">

                                                        <img src="{{ getPhoto($details['image']) }}" width="50"
                                                            class="img-responsive" />


                                                    </td>
                                                    <td data-th="Product">
                                                        <span>{{ $details['name'] }}</span>
                                                    </td>
                                                    <td data-th="Price">{{ getPrice($details['price']) }}</td>
                                                    <td data-th="Quantity">
                                                        <input type="number" value="{{ $details['quantity'] }}"
                                                            class="form-control quantity update-cart allownumericwithoutdecimal" />
                                                    </td>
                                                    <td data-th="Subtotal" class="text-center">
                                                        {{ getPrice($line_total) }}
                                                    </td>
                                                    <td class="actions" data-th="">
                                                        <button class="btn btn-danger btn-sm remove-from-cart"><i
                                                                class="fas fa-trash"></i></button>
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
                                    </tbody>
                                    @if (session('cart'))
                                        <tfoot>
                                            <tr>
                                                <td colspan="4" class="text-end">
                                                    <h5><strong> Total : </strong></h5>
                                                </td>
                                                <td class="text-center">{{ getPrice($total) }}</td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card shopping_btn">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <div class="button">
                            <a href="{{ route('card.preview', $business_card_details->card_url) }}"
                                class="btn btn-primary"><i class="fa fa-angle-left"></i> Back to
                                Shopping</a>
                        </div>
                        <div class="button">
                            <a href="{{ route('checkout', ['card_id' => $business_card_details->card_id]) }}"
                                class="btn btn-success">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(".allownumericwithoutdecimal").on("keypress keyup blur", function(event) {
            $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });

        $(".update-cart").change(function(e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });



        $(".remove-from-cart").click(function(e) {
            e.preventDefault();
            var ele = $(this);
            if (confirm("Are you sure want to remove?")) {
                console.log(ele);
                $.ajax({
                    url: '{{ route('remove.from.cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        console.log(response);
                        window.location.reload();
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        });
    </script>
</body>

</html>
