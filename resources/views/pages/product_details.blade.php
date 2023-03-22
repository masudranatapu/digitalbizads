<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Product Details</title>

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
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lightgallery-bundle.css') }}">
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
            style="@if ($store->header_backgroung) background-color: {{ $store->header_backgroung }} @endif; @if ($store->header_text_color) color: {{ $store->header_text_color }} @endif">
            <div class="container-fluid d-flex justify-content-between">
                <div @if ($store->header_text_color) color: {{ $store->header_text_color }} @endif>
                    <a class="navbar-brand" href="{{ route('card.preview', $store->card_url) }}">
                        @if ($store->profile)
                            <img src="{{ url('/') }}{{ $store->profile }}"
                                alt="{{ $store->title }}" width="40px">
                        @else
                            {{ $store->title }}
                        @endif
                    </a>
                </div>
                <a href="{{ route('cart') }}" class="nav-link">
                    <span class="cart">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="@if ($store->header_text_color) {{ $store->header_text_color }} @else #000000 @endif ">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </span>
                </a>
            </div>
        </nav>
    </section>


    <div class="product_details_section mt-5 mb-5">
        <div class="container">
            <div class="row mb-5 g-4">
                <div class="col-lg-6">
                    <div class="product_gallery">
                        <div class="product-item__gallery single_product">
                            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                                class="swiper mySwiper2">
                                <div class="swiper-wrapper single_item" id="lightgallery">

                                    <a class="swiper-slide" href="">
                                        <img src="{{ getPhoto($product->product_image) }}" alt="product-img" />
                                    </a>

                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>

                            <div thumbsSlider="" class="swiper mySwiper">
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

                    <form action="{{ route('addtocart') }}" method="post">
                        @csrf
                        <input type="hidden" name="productId" value="{{ $product->id }}" id="">
                        <div class="product_info">
                            <span class="badge badge-success mb-3">{{ $product->badge }}</span>
                            <h3>
                                @if ($product->sales_price != $product->regular_price)
                                    <del class="text-dark fw-lighter">
                                        <span>{{ $currency_symbol }} {{ CurrencyFormat($product->regular_price) }}</span>
                                    </del>
                                @endif

                                <span>&nbsp;{{ $currency_symbol }}</span><span
                                    id="totalPrice">{{ $product->sales_price != $product->regular_price ? CurrencyFormat($product->sales_price) : CurrencyFormat($product->regular_price) }}</span>
                                <input id="mainPrice" type="hidden" value="{{ $product->sales_price != $product->regular_price ? CurrencyFormat($product->sales_price) : CurrencyFormat($product->regular_price) }}">
                            </h3>
                            <h2>{{ $product->product_name }}</h2>
                            <p>
                                {{ $product->product_subtitle }}
                            </p>
                            @if ($product->is_variant)

                                @if (isset($product->hasVariant) && $product->hasVariant->count() > 0)
                                    <div class="product_variant mb-4">
                                        <div class="row">
                                            @foreach ($product->hasVariant as $variant)
                                                @if (count($variant->hasOption) > 0)
                                                    <div class="col-6">
                                                        <div class="size">
                                                            <label for="size" class="form-label">{{ $variant->name }}</label>
                                                            <select name="option[]" id="{{ str_replace(' ', '_', strtolower(trim($variant->name))) }}" class="form-control" >

                                                                @foreach ($variant->hasOption as $option)
                                                                    @if ($option->stock > 0)
                                                                        <option value="{{ $option->id }}"
                                                                            data-price="{{ $option->price }}">
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

                                <li class=" text-capitalize"><strong>Category:</strong>
                                    {{ $product->hasCategory->category_name ?? '' }}</li>

                            </ul>
                        </div>

                        <div class="product_button">
                            <div class="d-flex">
                                <div class="qty me-4">
                                    <div class="input-group">
                                        <span id="qtySub" class="input-type-text"><i class="fa fa-minus"></i></span>
                                        <input type="number" class="form-control" name="qty" id="qty"
                                            value="1" min="1" max="100" readonly>
                                        <span id="qtyAdd" class="input-type-text"><i
                                                class="fa fa-plus"></i></span>
                                    </div>
                                    <span class="qtyAlert text-danger"></span>
                                </div>
                                <div class="add_to_cart">
                                    <button type="submit" class="btn btn-primary">Add to Cart</button>
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





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/lightgallery.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/whatsapp-store/js/script.js') }}"></script>


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
            var values = $("select[name^='option[]']").map(function(idx, ele) {
                return $(ele).children('option:selected').data();
            }).get();
            let price = values.map((ind, element) => {
                return ind.price ?? 0;
            })
            let total = price.reduce((partialSum, a) => partialSum + a, 0)
            let mainPrice = $('#mainPrice').val();
            let newPrice = parseInt(total) + parseInt(mainPrice);
            $('#totalPrice').text(newPrice.toFixed(2));
        })

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

        @if (session()->has('success'))
            successAlert("{{ session()->get('success') }}");
        @endif
        @if (session()->has('alert'))
            successAlert("{{ session()->geT('alert') }}");
        @endif
    </script>
</body>

</html>
