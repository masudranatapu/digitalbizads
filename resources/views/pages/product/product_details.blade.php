@extends('pages.product.layouts.master')
@section('title', 'Product Details')
@push('css')
    <link href="{{ asset('assets/css/lightgallery-bundle.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="product_details_section mt-5 mb-5">
        <div class="container">
            <div class="row mb-5 g-4">
                <div class="col-lg-6">
                    <div class="product_gallery">
                        <div class="product-item__gallery single_product">
                            <div class="swiper mySwiper2"
                                style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff">
                                <div class="swiper-wrapper single_item" id="lightgallery">

                                    <a class="swiper-slide" data-src="{{ getPhoto($product->product_image) }}"
                                        href="">
                                        <img src="{{ getPhoto($product->product_image) }}" alt="product-img" />
                                    </a>

                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>

                            <div class="swiper mySwiper" thumbsSlider="">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{ getPhoto($product->product_image) }}" alt="product-img" />
                                    </div>
                                    {{-- <div class="swiper-slide">
                                        <img src="{{ asset('images/64031bc54f630-6412a16c3dccc.jpg') }}"
                                            alt="product-img" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('images/64031bc54f630-6412a16d1f05d.jpg') }}"
                                            alt="product-img" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('images/64031bc54f630-6412a16cd00a1.jpg') }}"
                                            alt="product-img" />
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">

                    <form class="addToCartForm" action="{{ route('addtocart') }}" method="post">
                        @csrf
                        <input id="productId" name="productId" type="hidden" value="{{ $product->id }}">
                        <div class="product_info">
                            <span class="badge badge-success mb-3">{{ $product->badge }}</span>
                            <h3>
                                @if ($product->sales_price != $product->regular_price)
                                    <del class="text-dark fw-lighter">
                                        <span>{{ $currency_symbol }}
                                            {{ CurrencyFormat($product->regular_price) }}</span>
                                    </del>
                                @endif

                                <span>&nbsp;{{ $currency_symbol }}</span><span
                                    id="totalPrice">{{ $product->sales_price != $product->regular_price ? CurrencyFormat($product->sales_price) : CurrencyFormat($product->regular_price) }}</span>
                                <input id="mainPrice" type="hidden"
                                    value="{{ $product->sales_price != $product->regular_price ? CurrencyFormat($product->sales_price) : CurrencyFormat($product->regular_price) }}">
                            </h3>
                            <h2>{{ $product->product_name }}</h2>
                            <p>
                                {{ $product->product_subtitle }}
                            </p>
                            @if ($product->product_stock <= 0)
                                <span class="badge text-bg-danger">{{ __('Out of stock') }}</span>
                            @else
                                <span class="badge text-bg-success">{{ __('Stock') }}
                                    ({{ $product->product_stock }})
                                </span>
                            @endif
                            @if ($product->is_variant)

                                @if (isset($product->hasVariant) && $product->hasVariant->count() > 0)
                                    <div class="product_variant mb-4">
                                        <div class="row">
                                            @foreach ($product->hasVariant as $variant)
                                                @if (count($variant->hasOption) > 0)
                                                    <div class="col-6">
                                                        <div class="size">
                                                            <label class="form-label"
                                                                for="size">{{ $variant->name }}</label>
                                                            <select class="form-control"
                                                                id="{{ str_replace(' ', '_', strtolower(trim($variant->name))) }}"
                                                                name="option[]">

                                                                @foreach ($variant->hasOption as $option)
                                                                    @if ($option->stock > 0)
                                                                        <option data-price="{{ $option->price }}"
                                                                            data-variant="{{ $variant->name }}"
                                                                            value="{{ $option->id }}">
                                                                            {{ $option->name }}
                                                                            ({{ getPrice($option->price) }})
                                                                        </option>
                                                                    @endif
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                            @endif

                            <ul class="mb-4">

                                <li class="text-capitalize"><strong>Category:</strong>
                                    {{ $product->hasCategory->category_name ?? '' }}</li>

                            </ul>
                        </div>

                        <div class="product_button">
                            <div class="d-flex">
                                <div class="qty me-4">
                                    <div class="input-group">
                                        <span class="input-type-text" id="qtySub"><i class="fa fa-minus"></i></span>
                                        <input class="form-control" id="qty" name="qty" type="number"
                                            value="1" min="1" max="100" readonly>
                                        <span class="input-type-text" id="qtyAdd"><i class="fa fa-plus"></i></span>
                                    </div>
                                    <span class="qtyAlert text-danger"></span>
                                </div>
                                <div class="add_to_cart">
                                    <button class="btn btn-primary" type="submit">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            {{-- <div class="details">
                <h3>Details:</h3>
                <p>
                    Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                    classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin
                    professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words,
                    consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical
                    literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33
                    of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This
                    book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of
                    Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur, iure quia atque dolore autem
                    impedit reiciendis, amet sed deserunt fuga pariatur cumque aliquid mollitia dicta distinctio esse
                    obcaecati, perferendis dolores!
                </p>
                <p>
                    Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                    classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin
                    professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words,
                    consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical
                    literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33
                    of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This
                    book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of
                    Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

                </p>
            </div> --}}
        </div>
    </div>

@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/lightgallery.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/whatsapp-store/js/script.js') }}"></script>

    @if ($product->is_variant)
        <script>
            $(document).ready(function() {
                getVariantPrice();
            })
        </script>
    @endif

    <!-- lightgallery  -->
    <script type="text/javascript">
        $(document).ready(function() {
            lightGallery(document.getElementById('lightgallery'), {
                download: false,
                speed: 500,
                thumbnail: true,
            });
        })
    </script>
    {{-- product carousel --}}
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 12,
            freeMode: true,
            watchSlidesProgress: true,
            breakpoints: {

                1024: {
                    slidesPerView: 6,
                },
                1: {
                    slidesPerView: 3,
                },
            },
        });

        var swiper2 = new Swiper(".mySwiper2", {
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
    </script>

    <script>
        $("select[name^='option[]']").change(function() {
            getVariantPrice();

        })


        function getVariantPrice() {
            var values = $("select[name^='option[]']").map(function(idx, ele) {
                return $(ele).children('option:selected').data();
            }).get();

            var price = values.map(({
                price
            }, element) => {
                return parseFloat(price);
            });

            console.dir({
                values,
                price
            });
            var total = price.reduce((partialSum, a) => partialSum + a, 0);

            var mainPrice = parseFloat($('#mainPrice').val());
            var newPrice = total + mainPrice;
            $('#totalPrice').text(newPrice.toFixed(2));
        }


        $('#qtyAdd').click(function() {
            let qty = $('#qty').val();
            $('#qty').val(parseInt(qty) + 1);
            $('.qtyAlert').html('');

        })
        $('#qtySub').click(function() {
            let qty = parseInt($('#qty').val());
            if (qty <= 0) {
                $('.qtyAlert').html('Quantity can not be less then 0');
                console.log(qty);
            } else {
                $('#qty').val(qty - 1);
                $('.qtyAlert').html('');

            }

        })
    </script>

    <script>
        $('.addToCartForm').submit(function(e) {
            e.preventDefault();
            let variants = $("select[name^='option[]']").map(function(idx, ele) {
                return $(ele).children('option:selected').data('variant');
            }).get();

            let options = $("select[name^='option[]']").map(function(idx, ele) {
                return $(ele).children('option:selected').val();
            }).get();

            let quantity = $('#qty').val();

            let pid = $('#productId').val();

            $.ajax({
                type: 'POST',
                url: "{{ route('addtocart') }}",
                data: {
                    pid: pid,
                    qty: quantity,
                    variants: variants,
                    options: options,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    const {
                        status,
                        message,
                        total_product
                    } = data;


                    if (status == true) {
                        successAlert(message);
                        $('.cartCounter').html(total_product)
                    } else {
                        errorAlert(message);

                    }

                },
                error: function(error) {
                    console.log(error);
                },
                complete: function() {
                    // document.location.reload();
                }



            })
        })
    </script>
@endpush
