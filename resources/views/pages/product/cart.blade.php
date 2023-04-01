@extends('pages.product.layouts.master')
@section('title', 'Product Cart')
@section('content')

    <div class="cart_page mt-5 mb-5">
        <div class="container">
            <div class="heading mb-4">
                <h3>Cart</h3>
            </div>
            <div class="col-sm-12 col-lg-12 d-none d-md-block">

                <div id="view_cart_load">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="table-responsive shopping-cart">
                                <div class="table-responsive">
                                    <table class="table table-hover table-condensed" id="cart">
                                        <thead>
                                            <tr>
                                                <th class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell"
                                                    style="width:10%">Photo</th>
                                                <th style="width:35%">Product</th>
                                                <th class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell"
                                                    style="width:15%">Price</th>
                                                <th style="width:15%">Quantity</th>
                                                <th class="text-center" style="width:20%">Subtotal</th>
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

                                                    <tr class="align-middle" data-id="{{ $id }}">
                                                        <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell"
                                                            data-th="Photo">

                                                            <img class="img-responsive"
                                                                src="{{ getPhoto($details['product']['product_image']) }}"
                                                                width="50" />

                                                        </td>
                                                        <td data-th="Product">
                                                            <span>{{ $details['product']['product_name'] }}</span>
                                                        </td>
                                                        <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell"
                                                            data-th="Price">{{ getPrice($details['price']) }}</td>
                                                        <td data-th="Quantity">
                                                            <input
                                                                class="form-control quantity update-cart allownumericwithoutdecimalMobile"
                                                                type="number" value="{{ $details['quantity'] }}" />
                                                        </td>
                                                        <td class="text-center" data-th="Subtotal">

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
                                                    <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell"></td>
                                                    <td class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell"></td>
                                                    <td></td>
                                                    <td class="text-end">
                                                        <h5><strong> Total </strong></h5>
                                                    </td>
                                                    <td class="text-center">{{ getPrice($total) }}</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        @if (session()->has('coupon'))
                                                            <p>Remove coupon</p>
                                                        @else
                                                            <p>Apply coupon</p>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <input class="form-control" id="couponCode" type="text"
                                                            value="{{ session('coupon')->coupon_code ?? '' }}"
                                                            @if (session()->has('coupon')) disabled @endif
                                                            placeholder="Enter coupon code">

                                                    </td>
                                                    <td class="text-center" id="cupponPrice">

                                                        @if (session()->has('coupon'))
                                                            @if (session('coupon')->type == 'amount')
                                                                - {{ getPrice(session('coupon')->amount) }}
                                                            @elseif (session('coupon')->type == 'percent')
                                                                - {{ getPrice(($total * session('coupon')->amount) / 100) }}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (session()->has('coupon'))
                                                            <button class="btn btn-primary" id="couponRemove"
                                                                type="button">Remove</button>
                                                        @else
                                                            <button class="btn btn-primary" id="couponApply"
                                                                type="button">Apply</button>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-end" colspan="4">
                                                        <h5><strong>Grand Total : </strong></h5>
                                                    </td>
                                                    <td class="text-center">

                                                        @if (session()->has('coupon'))
                                                            @if (session('coupon')->type == 'amount')
                                                                <h5>{{ getprice($total - session('coupon')->amount) }}</h5>
                                                            @elseif (session('coupon')->type == 'percent')
                                                                <h5>
                                                                    <strong>{{ getprice($total - ($total * session('coupon')->amount) / 100) }}
                                                                    </strong><span>
                                                                        (-{{ session('coupon')->amount }}%)
                                                                    </span>
                                                                </h5>
                                                            @else
                                                                <h5>
                                                                    {{ getprice($total) }}
                                                                </h5>
                                                            @endif
                                                        @else
                                                            <h5>
                                                                {{ getprice($total) }}
                                                            </h5>
                                                        @endif

                                                    </td>
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
                                <a class="btn btn-primary"
                                    href="{{ route('card.preview', $business_card_details->card_url) }}"><i
                                        class="fa fa-angle-left"></i> Back to
                                    Shopping</a>
                            </div>

                            @if (session()->has('cart') && count(session()->get('cart')) > 0)
                                <div class="button">
                                    <a class="btn btn-success"
                                        href="{{ route('checkout', ['cardUrl' => $business_card_details->card_url]) }}">Checkout</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-block d-sm-block d-md-none d-lg-none d-xl-none">
                <div class="row">
                    <table class="table table-hover table-condensed" id="cart">
                        <thead>
                            <tr>

                                <th style="width:70%">Product</th>
                                <th style="width:30%">Remove</th>
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
                                            <strong>Name :
                                            </strong><span>{{ $details['product']['product_name'] }}</span><br>

                                            Quantity:<span><input
                                                    class="form-control quantity update-cart allownumericwithoutdecimalMobile"
                                                    type="number" value="{{ $details['quantity'] }}"
                                                    {{-- style="width: 70px" --}} /></span><br>

                                            <strong>Price : </strong><span>{{ getPrice($details['price']) }}</span><br>

                                            <strong>Subtotal : </strong><span>{{ getPrice($line_total) }}</span><br>

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
                                    <td class="text-end">
                                        <h5><strong> Total : </strong></h5>
                                    </td>
                                    <td class="text-center">{{ getPrice($total) }}</td>

                                </tr>
                                <tr>
                                    <td colspan="2">
                                        @if (session()->has('coupon'))
                                            <p>Remove coupon</p>
                                        @else
                                            <p>Apply coupon</p>
                                        @endif
                                    </td>
                                    <td></td>
                                    <td colspan="2">
                                        <input class="form-control" id="couponCode" type="text"
                                            value="{{ session('coupon')->coupon_code ?? '' }}"
                                            @if (session()->has('coupon')) disabled @endif
                                            placeholder="Enter coupon code">

                                    </td>
                                    <td class="text-center" id="cupponPrice">
                                        @dump(session('coupon'))
                                        @if (session()->has('coupon'))
                                            @if (session('coupon')->type == 'amount')
                                                - {{ getPrice(session('coupon')->amount) }}
                                            @elseif (session('coupon')->type == 'percent')
                                                - {{ getPrice(($total * session('coupon')->amount) / 100) }}
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if (session()->has('coupon'))
                                            <button class="btn btn-primary" id="couponRemove"
                                                type="button">Remove</button>
                                        @else
                                            <button class="btn btn-primary" id="couponApply"
                                                type="button">Apply</button>
                                        @endif
                                    </td>
                                </tr>
                            </tfoot>
                        @endif
                    </table>

                </div>

                <div class="card shopping_btn fixed-bottom">
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <div class="button">
                                <a class="btn btn-primary"
                                    href="{{ route('card.preview', $business_card_details->card_url) }}"><i
                                        class="fa fa-angle-left"></i> Back to
                                    Shopping</a>
                            </div>

                            @if (session()->has('cart') && count(session()->get('cart')) > 0)
                                <div class="button">
                                    <a class="btn btn-success"
                                        href="{{ route('checkout', ['cardUrl' => $business_card_details->card_url]) }}">Checkout</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('frontend/whatsapp-store/js/script.js') }}"></script>

        <script>
            $(".allownumericwithoutdecimal").on("keypress keyup blur", function(event) {
                $(this).val($(this).val().replace(/[^\d].+/, ""));
                $('.allownumericwithoutdecimalMobile').val($(this).val().replace(/[^\d].+/, ""))

                if ((event.which < 48 || event.which > 57)) {
                    event.preventDefault();
                }
            });
            $(".allownumericwithoutdecimalMobile").on("keypress keyup blur", function(event) {
                $(this).val($(this).val().replace(/[^\d].+/, ""));
                $('.allownumericwithoutdecimal').val($(this).val().replace(/[^\d].+/, ""))
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
                        const {
                            status,
                            message,
                            total_product
                        } = response;

                        if (status == true) {
                            successAlert(message);

                            window.location.reload();
                        } else {
                            errorAlert(message);

                        }
                    }
                });
            });

            $(".update-cart-mobile").change(function(e) {
                e.preventDefault();
                var ele = $(this);

                $.ajax({
                    url: '{{ route('update.cart') }}',
                    method: "patch",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("div").attr("data-id"),
                        quantity: ele.parents("div").find(".quantityMobile").val()
                    },
                    success: function(response) {

                        const {
                            status,
                            message,
                            total_product
                        } = response;

                        if (status == true) {
                            successAlert(message);

                            window.location.reload();
                        } else {
                            errorAlert(message);

                        }

                    }
                });
            });



            $(".remove-from-cart").click(function(e) {

                e.preventDefault();
                var ele = $(this);
                if (confirm("Are you sure want to remove?")) {
                    console.log(ele);
                    $.ajax({
                        url: "{{ route('remove.from.cart') }}",
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

            $('#couponApply').click(function() {
                let code = $('#couponCode').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "{{ route('check.coupon', ['cardUrl' => $business_card_details->card_url]) }}",
                    data: {
                        code: code
                    },
                    success: function(data) {
                        console.log(data);
                        if (data) {
                            const {
                                status,
                                message
                            } = data;

                            if (status) {
                                successAlert(message);
                                window.location.reload();

                            } else {
                                errorAlert(message);
                            }

                        }
                    }
                });
            });

            $('#couponRemove').click(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "{{ route('remove.coupon', ['cardUrl' => $business_card_details->card_url]) }}",
                    success: function(data) {
                        console.log(data);
                        if (data) {
                            const {
                                status,
                                message
                            } = data;

                            if (status) {
                                successAlert(message);
                                window.location.reload();

                            } else {
                                errorAlert(message);
                            }

                        }
                    }
                });
            })
        </script>
    @endpush
@endsection
