<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $card_details->title }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}

    <link rel="icon" href="{{ url('/') }}{{ $business_card_details->profile }}" sizes="96x96" type="image/png" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400&display=swap">
    <link rel="stylesheet" href="{{ asset('frontend/whatsapp-store/css/tailwind/tailwind.min.css') }}">
    <script src="{{ asset('frontend/whatsapp-store/js/main.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}" />
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
</head>

<body class="antialiased bg-body text-body font-body"
    dir="{{ App::isLocale('ar') || App::isLocale('ur') || App::isLocale('he') ? 'rtl' : 'ltr' }}">
    <div class="">

        <section>
            <nav dir="ltr" class="relative">
                <div class="p-6 flex items-center bg-white shadow">
                    <a class="flex-shrink-0 text-2xl font-semibold">
                        <img class="h-10" src="{{ url('/') }}{{ $business_card_details->profile }}"
                            alt="{{ $business_card_details->title }}" width="auto">
                    </a>


                    <div class="ml-auto flex">
                        <button class="navbar-burger flex items-center">
                            <span class="relative inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                <span
                                    class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-500 rounded-full"
                                    id="badge"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </nav>

            <div class="hidden navbar-menu relative z-50">
                <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-10"></div>
                <nav
                    class="fixed top-0 left-0 bottom-0 flex flex-col w-3/4 lg:w-80 sm:max-w-xs pt-6 pb-8 bg-white border-r overflow-y-auto">
                    <div class="flex w-full items-center px-6 pb-6 mb-6 lg:border-b border-blue-50">
                        <a class="text-xl text-dark font-semibold">
                            <img class="h-8" src="{{ url('/') }}{{ $business_card_details->profile }}"
                                alt="{{ $business_card_details->title }}" width="auto">
                        </a>
                    </div>

                    <div id="cart_items"></div>

                    <div class="pt-6 p-3">
                        <a onclick="placeOrder()" id="place-order" style="cursor: pointer"
                            class="block px-4 py-3 mb-3 rounded text-white text-md text-center font-semibold bg-{{ $business_card_details->theme_color }}-500 hover:bg-{{ $business_card_details->theme_color }}-600 ">{{
                            __('Place WhatsApp Order') }}</a>
                    </div>
                    <div class="pt-6 p-3">
                        <a onclick="placeOrderEmail()" id="place-order-email" style="cursor: pointer"
                            class="block px-4 py-3 mb-3 rounded text-white text-md text-center font-semibold bg-{{ $business_card_details->theme_color }}-500 hover:bg-{{ $business_card_details->theme_color }}-600 ">{{
                            __('Place Order To Email') }}</a>
                    </div>

                    <div id="empty-cart" class="pt-6 p-3">
                        <p class="px-4 py-4 font-bold mb-4 text-center text-gray-600">{{ __('Your cart is empty.') }}
                        </p>

                        <a
                            class="block navbar-backdrop px-4 py-3 mb-3 mt-4 rounded text-white text-md text-center font-semibold bg-{{ $business_card_details->theme_color }}-500 hover:bg-{{ $business_card_details->theme_color }}-600 ">{{
                            __('Start Shopping') }}</a>
                    </div>

                </nav>

            </div>
        </section>

        <div class="py-6 px-1">
            <div class="container px-4 mx-auto">
                <h2 class="text-2xl font-bold">{{ $business_card_details->sub_title }}</h2>
            </div>
        </div>


        @if ($business_card_details->card_status == 'activated')


            <section class="py-1">
                <div class="container px-4 mx-auto">
                    <div class="rounded overflow-hidden">
                        <img class="rounded pb-2" src="{{ url('/') }}{{ $business_card_details->cover }}"
                            alt="{{ $business_card_details->title }}">
                    </div>
                </div>
            </section>

            <section id="shop" class="py-8">
                <div class="container px-4 mx-auto">
                    <div class="flex flex-wrap -m-4">

                        @foreach ($products as $product)
                            <div class="w-1/1 lg:w-1/3 p-4">
                                <div class="p-4 bg-white shadow-lg rounded-lg" style="height:100% !important;">
                                    <div class="w-full mb-2">
                                        <img class="rounded pb-2" id="{{ $product->product_id }}_product_image"
                                            src="{{ asset($product->product_image) }}"
                                            alt="{{ $product->product_name }}">
                                    </div>
                                    <span
                                        class="py-1 px-2 bg-red-500 rounded text-xs text-white">{{ $product->badge }}</span>
                                    <div class="w-full mb-1 mt-1 justify-between items-center">
                                        <div>
                                            <h3 id="{{ $product->product_id }}_product_name"
                                                class="text-sm font-medium">
                                                {{ $product->product_name }}</h3>
                                            <span id="{{ $product->product_id }}_subtitle"
                                                class="text-xs text-gray-500">{{ $product->product_subtitle }}</span>
                                        </div>
                                    </div>
                                    <div class="w-full mb-1 justify-between items-center">
                                        <h4 class="text-sm mb-3 font-bold"><span
                                                id="{{ $product->product_id }}_currency">{{ $currency }}</span>
                                            <span
                                                id="{{ $product->product_id }}_price">{{ $product->sales_price }}</span>
                                            @if ($product->sales_price != $product->regular_price)
                                                <span class="text-xs line-through text-red-500 font-bold">
                                                    {{ $currency }}{{ $product->regular_price }}</span>
                                            @endif
                                        </h4>
                                        @if ($product->product_status == 'instock')
                                            <a onclick="addToCart('{{ $product->product_id }}')"
                                                class="py-2 px-4 bg-{{ $business_card_details->theme_color }}-500 hover:bg-{{ $business_card_details->theme_color }}-600 rounded text-md text-white transition duration-200"
                                                style="cursor: pointer;">{{ __('Add') }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </section>
        @else
            <div class="text-center text-light d-flex align-items-center" style="min-height: 90vh">
                <h2 style="color: #000000 ;font-size:25px;">Your Bizad is currently Inactive. Please activate.</h2>
            </div>
        @endif

        <div class="py-8">


            <div id="share" class="w-auto border-t px-5 align-middle py-4 border-b">
                <p class="text-gray-700 font-semibold text-lg">{{ __('Share on') }}</p>
            </div>

            <div class="w-auto ml-6 pb-3 border-t pt-3">
                <ul class="grid grid-flow-col lg:grid-cols-12 grid-cols-6 grid-rows-1">

                    <a target="_blank" href="{{ $shareComponent['facebook'] }}">
                        <li class="flex cursor-pointer items-center">
                            <div
                                class="flex justify-center items-center content-center bg-gradient-to-br from-{{ $business_card_details->theme_color }}-300 to-{{ $business_card_details->theme_color }}-600 shadow-md hover:shadow-lg h-12 w-12 rounded-full fill-current text-white">
                                <i class="fab fa-facebook"></i>
                            </div>
                        </li>
                    </a>

                    <a target="_blank" href="{{ $shareComponent['twitter'] }}">
                        <li class="flex cursor-pointer items-center">
                            <div
                                class="flex justify-center items-center content-center bg-gradient-to-br from-{{ $business_card_details->theme_color }}-300 to-{{ $business_card_details->theme_color }}-600 shadow-md hover:shadow-lg h-12 w-12 rounded-full fill-current text-white">
                                <i class="fab fa-twitter"></i>
                            </div>
                        </li>
                    </a>

                    <a target="_blank" href="{{ $shareComponent['linkedin'] }}">
                        <li class="flex cursor-pointer items-center">
                            <div
                                class="flex justify-center items-center content-center bg-gradient-to-br from-{{ $business_card_details->theme_color }}-300 to-{{ $business_card_details->theme_color }}-600 shadow-md hover:shadow-lg h-12 w-12 rounded-full fill-current text-white">
                                <i class="fab fa-linkedin"></i>
                            </div>
                        </li>
                    </a>

                    <a target="_blank" href="{{ $shareComponent['telegram'] }}">
                        <li class="flex cursor-pointer items-center">
                            <div
                                class="flex justify-center items-center content-center bg-gradient-to-br from-{{ $business_card_details->theme_color }}-300 to-{{ $business_card_details->theme_color }}-600 shadow-md hover:shadow-lg h-12 w-12 rounded-full fill-current text-white">
                                <i class="fab fa-telegram"></i>
                            </div>
                        </li>
                    </a>

                    <a target="_blank" href="{{ $shareComponent['whatsapp'] }}">
                        <li class="flex cursor-pointer items-center">
                            <div
                                class="flex justify-center items-center content-center bg-gradient-to-br from-{{ $business_card_details->theme_color }}-300 to-{{ $business_card_details->theme_color }}-600 shadow-md hover:shadow-lg h-12 w-12 rounded-full fill-current text-white">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                        </li>
                    </a>

                </ul>
            </div>

        </div>





        @if ($plan_details['hide_branding'] == '1')
        <div class="my-4 mt-12">
            <p class="mb-2 text-center text-base text-dark">{{ __('Copyright') }} &copy;
                {{ $card_details->title }} <span id="year"></span>.
            </p>
        </div>
        @else
        <div class="my-4 mt-12">
            <p class="mb-2 text-center text-base text-gray-500">{{ __('Copyright') }} &copy; <span id="year"></span>. <a
                    href="{{ url('/') }}">{{ config('app.name') }}
                    {{ __('WhatsApp Store') }}</a></p>
        </div>
        @endif
    </div>
    <script src="{{ asset('frontend/whatsapp-store/js/script.js') }}"></script>
    <script>
        var cart = [];
        var whatsAppNumber = "{{ $enquiry_button ?? '' }}";
        var whatsAppMessage = "{{ $whatsapp_msg }}";
        var currency = "{{ $currency }}";

        $("#badge").hide();
        $("#place-order").hide();
        $("#place-order-email").hide();
        $("#empty-cart").show();

        function addToCart(pid) {
            "use strict";
            var productName = $("#" + pid + "_product_name").text();

            var price = $("#" + pid + "_price").text();
            var product_image = $("#" + pid + "_product_image").attr("src");
            var subtitle = $("#" + pid + "_subtitle").text();

            var quantity_increment = false;
            for (let index = 0; index < cart.length; index++) {
                if (cart[index].product_id == pid) {
                    cart[index].qty = cart[index].qty + 1;
                    quantity_increment = true;
                    successAlert('{{ __('Cart updated') }}');
                    updateBadge();
                }
            }
            if (quantity_increment == false) {
                cart.push({
                    "product_name": productName,
                    "price": price,
                    "product_id": pid,
                    "currency": currency,
                    "qty": 1,
                    "product_image": product_image,
                    "subtitle": subtitle
                });
                successAlert("{{ __('Item added to cart') }}");
                updateBadge();
            }
            updateList();

        }

        function updateList() {
            "use strict";
            var cart_items = "";
            var grandTotal = 0;
            for (let j = 0; j < cart.length; j++) {
                var total_price = 0;
                total_price = cart[j].qty * Number(cart[j].price);
                grandTotal += Number(total_price);
                cart_items += '<div class="p-4 bg-white rounded"><img class="rounded bp-2" src="' + cart[j].product_image +
                    '"><div class="flex mb-6 mt-1 justify-between items-center"><div><h3 class="text-sm font-medium">' +
                    cart[j].product_name + '</h3> <span class="text-xs text-gray-500">' + cart[j].subtitle +
                    '</span></div></div><div class="flex mb-2 justify-between items-center"><h4 class="text-xl font-bold">' +
                    currency + ' ' + total_price + '</h4> <a onclick="reduceQty(' + j +
                    ')" class="py-2 px-3 bg-red-500 hover:bg-red-600 rounded-full text-xs text-white transition duration-200">-</a><h4 class="text-sm font-medium">' +
                    cart[j].qty + '</h4> <a onclick="addQty(' + j +
                    ')" class="py-2 px-3 bg-red-500 hover:bg-red-600 rounded-full text-xs text-white transition duration-200">+</a> <a class="py-2 px-3 bg-red-500 hover:bg-red-600 rounded-full text-xs text-white transition duration-200" onclick="removeFromCart(' +
                    j + ')">X</a></div></div>';
            }
            cart_items += '<br> <h3 class="pl-4 pt-4 pr-4 font-bold">{{ __('Grand total:') }} ' + currency + ' ' +
                grandTotal.toFixed(2) + '</h3>';
            $("#cart_items").html(cart_items);
        }

        function updateBadge() {
            "use strict";
            var badgeCount = cart.length;
            if (badgeCount > 0) {
                $("#empty-cart").hide();
                $("#badge").text(badgeCount);
                $("#badge").show();
                $("#place-order").show();
                $("#place-order-email").show();
            } else {
                $("#badge").hide();
                $("#place-order-email").hide();
                $("#empty-cart").show();
            }
        }

        function reduceQty(i) {
            "use strict";
            if (cart[i].qty == 1) {
                removeFromCart(i);
            } else {
                cart[i].qty = cart[i].qty - 1;
                updateBadge();
                updateList();
            }
        }

        function addQty(i) {
            "use strict";
            cart[i].qty = cart[i].qty + 1;
            updateBadge();
            updateList();
        }

        function removeFromCart(i) {
            "use strict";
            var cartList = cart;
            cart = [];
            for (let l = 0; l < cartList.length; l++) {
                if (l == i) {} else {
                    cart.push(cartList[l])
                }
            }

            successAlert('{{ __('Item Removed') }}');
            updateBadge();
            updateList();
        }

        function placeOrder() {
            "use strict";
            Swal.fire({
                html: '<div class="text-left mt-2"> <p class="text-md">{{ __('Please fill following details:') }} </p>' +
                    '<label class="mt-6 block text-gray-700 text-sm font-bold mb-2" for="cus_name">{{ __('Full Name') }}</label>' +
                    '<input id="cus_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">' +

                    '<label class="mt-4 block text-gray-700 text-sm font-bold mb-2" for="cus_mobile">{{ __('Mobile') }}</label>' +
                    '<input id="cus_mobile" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">' +

                    '<label class="mt-4 block text-gray-700 text-sm font-bold mb-2" for="cus_address">{{ __('Address') }}</label>' +
                    '<input id="cus_address" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">' +
                    '</div>',

                focusConfirm: false,
                allowOutsideClick: false,
                showCancelButton: true,
                confirmButtonColor: '#17BB84',
                confirmButtonText: '{{ __('Confirm') }}',
                cancelButtonText: "{{ __('Close') }}",
                preConfirm: () => {
                    var customerDetails = [
                        document.getElementById('cus_name').value,
                        document.getElementById('cus_mobile').value,
                        document.getElementById('cus_address').value
                    ];
                    createWhatsAppLink(customerDetails);
                }
            })

        }

        function placeOrderEmail() {
            "use strict";
            Swal.fire({
                html: '<div class="text-left mt-2"> <p class="text-md">{{ __('Please fill following details:') }} </p>' +
                    '<label class="mt-6 block text-gray-700 text-sm font-bold mb-2" for="cus_name">{{ __('Full Name') }}</label>' +
                    '<input id="cus_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">' +

                    '<label class="mt-4 block text-gray-700 text-sm font-bold mb-2" for="cus_mobile">{{ __('Mobile') }}</label>' +
                    '<input id="cus_mobile" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">' +

                    '<label class="mt-4 block text-gray-700 text-sm font-bold mb-2" for="cus_address">{{ __('Address') }}</label>' +
                    '<input id="cus_address" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">' +
                    '</div>',

                focusConfirm: false,
                allowOutsideClick: false,
                showCancelButton: true,
                confirmButtonColor: '#17BB84',
                confirmButtonText: '{{ __('Confirm') }}',
                cancelButtonText: "{{ __('Close') }}",
                preConfirm: () => {
                    var customerDetails = [
                        document.getElementById('cus_name').value,
                        document.getElementById('cus_mobile').value,
                        document.getElementById('cus_address').value
                    ];
                    createEmailLink(customerDetails);
                }
            })

        }

        function createEmailLink(cusDetails) {
            "use strict";
            if (cusDetails[0].length >= 3 && cusDetails[0].length >= 4 && cusDetails[0].length >= 3) {
                successAlert('{{ __('Order Placed Successfully') }}');


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "{{ route('place.email.order') }}",
                    data: {
                        cart: cart,
                        card_user_id: "{{ $business_card_details->user_id }}",
                        customer_info: cusDetails

                    },
                    success: function(data) {

                        if (data.status == 'success') {

                            cart = [];

                        }

                    },
                    error: function(error) {
                        console.log(error);

                    },
                    complete: function() {

                        document.location.reload();

                    }

                });



            } else {
                placeOrder();
            }

        }

        function createWhatsAppLink(cusDetails) {
            "use strict";
            if (cusDetails[0].length >= 3 && cusDetails[0].length >= 4 && cusDetails[0].length >= 3) {

                var productsList = "\n- - - - - - - - - - - - - - - - - - - -\n";
                productsList += "📦 *`{{ __('Order Details:') }}`* \n";

                var grandTotal = 0;
                for (let x = 0; x < cart.length; x++) {
                    var item_cost = Number(cart[x].qty) * Number(cart[x].price);
                    var cart_price = Number(cart[x].price);
                    productsList += cart[x].product_name + "     " + cart[x].qty + " X " + cart_price.toFixed(2) +
                        "     *" + currency + " " + item_cost.toFixed(2) + "* \n";
                    grandTotal += Number(cart[x].price) * cart[x].qty;
                }

                productsList += "\n- - - - - - - - - - - - - - - - - - - -\n";
                productsList += "*`{{ __('Total :') }}`* " + "*" + currency + " " + grandTotal.toFixed(2) + "*";
                productsList += "\n- - - - - - - - - - - - - - - - - - - -\n\n";

                var customerDetails = "📞 *`{{ __('Customer Details:') }}`* \n\n";
                customerDetails += cusDetails[0] + "\n";
                customerDetails += cusDetails[1] + "\n";
                customerDetails += cusDetails[2] + "\n\n";

                var waShareContent = "🎉 *`{{ __('New Order') }}`* \n";
                waShareContent = waShareContent + productsList + customerDetails + "*" + whatsAppMessage + "*";



                var link = "https://api.whatsapp.com/send/?phone=" + whatsAppNumber + "&text=" + encodeURI(waShareContent);
                window.open(link, '_blank');

                successAlert('{{ __('Order Placed!') }}');
            } else {
                placeOrder();
            }

        }
    </script>
</body>

</html>
