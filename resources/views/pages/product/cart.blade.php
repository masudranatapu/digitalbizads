@extends('pages.product.layouts.master')
@section('title', 'Product Cart')
@section('content')



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

                                                        <img src="{{ getPhoto($details['product']['product_image']) }}"
                                                            width="50" class="img-responsive" />

                                                    </td>
                                                    <td data-th="Product">
                                                        <span>{{ $details['product']['product_name'] }}</span>
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

                        @if (session()->has('cart') && count(session()->get('cart')) > 0)
                            <div class="button">
                                <a href="{{ route('checkout', ['cardUrl' => $business_card_details->card_url]) }}"
                                    class="btn btn-success">Checkout</a>
                            </div>
                        @endif
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
        </script>
    @endpush
@endsection
