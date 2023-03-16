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
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
</head>

<body class="antialiased bg-body text-body font-body"
    dir="{{ App::isLocale('ar') || App::isLocale('ur') || App::isLocale('he') ? 'rtl' : 'ltr' }}">


    <div class="product_details_section mt-5 mb-5">
        <div class="container">
            <div class="row mb-5 g-4">
                <div class="col-lg-6">
                    <div class="product_gallery">
                        <div class="product-item__gallery single_product">
                            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                                class="swiper mySwiper2">
                                <div class="swiper-wrapper single_item" id="lightgallery">
                                    <a class="swiper-slide"
                                        href="{{ asset('images/64042a33159ef-640f2bef5b487.jpg') }}">
                                        <img src="{{ asset('images/64042a33159ef-640f2bef5b487.jpg') }}"
                                            alt="product-img" />
                                    </a>
                                    <a class="swiper-slide"
                                        href="{{ asset('images/64031bc54f630-6412a16c3dccc.jpg') }}">
                                        <img src="{{ asset('images/64031bc54f630-6412a16c3dccc.jpg') }}"
                                            alt="product-img" />
                                    </a>
                                    <a class="swiper-slide"
                                        href="{{ asset('images/64031bc54f630-6412a16d1f05d.jpg') }}">
                                        <img src="{{ asset('images/64031bc54f630-6412a16d1f05d.jpg') }}"
                                            alt="product-img" />
                                    </a>
                                    <a class="swiper-slide"
                                        href="{{ asset('images/64031bc54f630-6412a16cd00a1.jpg') }}">
                                        <img src="{{ asset('images/64031bc54f630-6412a16cd00a1.jpg') }}"
                                            alt="product-img" />
                                    </a>
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>

                            <div thumbsSlider="" class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{ asset('images/64042a33159ef-640f2bef5b487.jpg') }}"
                                            alt="product-img" />
                                    </div>
                                    <div class="swiper-slide">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product_info">
                        <span class="badge badge-success mb-3">New</span>
                        <h3>$455.55</h3>
                        <h2>Lorem ipsum dolor, sit amet consectetur.</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque mollitia illo inventore,
                            molestiae
                        </p>

                        <div class="product_variant mb-4">
                            <div class="row">
                                <div class="col-6">
                                    <div class="size">
                                        <label for="size" class="form-label">Size</label>
                                        <select name="size" id="size" class="form-control">
                                            <option value="S">S</option>
                                            <option value="XL">XL</option>
                                            <option value="XLL">XLL</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="color">
                                        <label for="color" class="form-label">Color</label>
                                        <select name="color" id="color" class="form-control">
                                            <option value="Red">Red</option>
                                            <option value="White">White</option>
                                            <option value="Black">Black</option>
                                            <option value="Green">Green</option>
                                            <option value="Yellow">Yellow</option>
                                            <option value="Blue">Blue</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <ul class="mb-4">
                            <li><strong>Brand:</strong> Hugo Boss</li>
                            <li><strong>Category:</strong> Pizza</li>
                            <li><strong>Tags:</strong> AHB010626</li>
                            <li><strong>SKU:</strong> #65dVy8J8Uo</li>
                        </ul>
                    </div>

                    <div class="product_button">
                        <div class="d-flex">
                            <div class="qty me-4">
                                <div class="input-group">
                                    <span class="input-type-text"><i class="fa fa-minus"></i></span>
                                    <input type="number" class="form-control" name="qty" id="qty" value="1" min="1"
                                        max="100" readonly>
                                    <span class="input-type-text"><i class="fa fa-plus"></i></span>
                                </div>
                            </div>
                            <div class="add_to_cart">
                                <a href="#" class="btn btn-primary">Add to Cart</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="details">
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
            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/lightgallery.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <!-- lightgallery  -->
    <script type="text/javascript">
        $(document).ready(function () {
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
</body>

</html>