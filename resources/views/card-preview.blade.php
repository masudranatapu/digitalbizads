<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Developed By" content="Arobil limited" />
    <meta name="Designer" content="Rabin Mia" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta id="csrf-token" name="csrf-token" content="{{ csrf_token() }}">
    {{--
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset($cardinfo->logo) }}"> --}}
    <link type="image/png" href="{{ $settings->favicon }}" rel="icon" sizes="96x96" />
    <!-- css file -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="{{ asset('assets/css/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/sweetalert.min.js') }}"></script>
    <title>{{ $cardinfo->adsname }}</title>
    <?php
    if (!empty($cardinfo->theme_color)) {
        $theme_color = $cardinfo->theme_color;
    } else {
        $theme_color = '#ffc107';
    }
    [$r, $g, $b] = sscanf($theme_color, '#%02x%02x%02x');
    $theme_bg = "$r, $g, $b,.5";
    $android = stripos($_SERVER['HTTP_USER_AGENT'], 'android');
    $iphone = stripos($_SERVER['HTTP_USER_AGENT'], 'iphone');
    $ipad = stripos($_SERVER['HTTP_USER_AGENT'], 'ipad');
    ?>
    <style>
        .card_template {
            background-color: rgba({{ $theme_bg }});
        }

        .social_item i {
            background-color: rgba({{ $theme_bg }});
            border-color: {{ $cardinfo->icon_border_color }};
            color: {{ $cardinfo->header_text_color }};
            /* border-color: {{ $cardinfo->icon_border_color ?? '#000000' }};
            color:{{ $cardinfo->header_text_color }}; */
        }

        /* .card_title, */
        .subscribe-btn,
        .purchase_btn a,
        .carousel-control-prev,
        .carousel-control-next,
        .purchase_btn a {
            background-color: {{ $theme_color }} !important;
        }

        .card_title h2 {
            font-family: {{ $cardinfo->header_font_family }}
        }

        .card_template .card_title {
            padding: 9px 0px 9px 0px;
            background: #eb8714;
        }

        .social_share {
            margin-bottom: 20px;
        }

        .social_share img {
            width: 56px !important;
        }

        .single_product .single_item img {
            height: auto !important;
            width: 100% !important;
        }

        .single_product .mySwiper2 {
            position: relative;
            width: 100%;
            margin-bottom: 4px;
            overflow: hidden;
            background-color: #ebeef7;
        }

        .single_product .mySwiper2 .swiper-slide {
            display: flex;
            justify-content: center;
        }

        .single_product .mySwiper2 .swiper-slide img {
            width: 100%;
            margin: 0px auto;
        }

        .single_product .mySwiper .swiper-slide {
            opacity: 0.4;
            border: 4px solid transparent;
            transition: all 0.3s ease-in;
            width: 76px !important;
            height: 76px;
            margin: 0 !important;
        }

        .single_product .mySwiper .swiper-slide-thumb-active {
            opacity: 1;
            border: 3px solid #2196f3;
        }

        .single_product .swiper {
            width: 100%;
            height: 100%;
        }

        .single_product .swiper-slide {
            display: flex;
            align-items: center;
            justify-content: center;
            background-size: cover;
            background-position: center;
        }

        .single_product .swiper-slide img {
            display: block;
            width: 70px;
            height: 70px;
            -o-object-fit: cover;
            object-fit: cover;
        }

        .single_product .swiper-button-prev {
            left: 24px;
        }

        .single_pro_content h3 {
            margin: 0;
            font-size: 17px;
            color: #555;
        }

        .single_product .swiper-button-prev,
        .single_product .swiper-button-next {
            color: #002233;
        }

        .single_product .swiper-button-prev::after,
        .single_product .swiper-button-next::after {
            font-size: 36px;
        }

        .single_product .swiper-button-next {
            right: 24px;
        }

        a.gallery-btn {
            position: absolute;
            top: 13px;
            right: 56px;
            font-size: 20px;
        }

        .save_contact a {
            padding: 12px 10px;
            font-size: 13px;
            font-family: 'Inter';
            font-weight: 700;
            text-align: center;
            width: 40%;
            border-radius: 6px;
            color: #fff;
            background: {{ $theme_color }};
            -webkit-transition: all 0.4s ease;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
        }

        .purchase_btn.save_contact {
            text-align: center;
            margin-bottom: 33px;
            margin-top: -19px;
            z-index: 5;
            position: relative;
            background: ;
        }

        @media screen and (max-width:380px) {
            .save_contact a {
                padding: 12px 3px;
                font-size: 11px;
                width: 44%;
            }
        }
    </style>
</head>

<body>
    <div class="card_wrapper">
        <div class="card_template">
            <!-- title -->
            <div class="card_title" style="background-color: {{ $cardinfo->header_backgroung ?? '#000000' }};">
                @if (!empty($cardinfo->logo))
                    <h2>
                        <div>
                            <img src="{{ asset($cardinfo->logo) }}" alt="logo">
                        </div>
                    </h2>
                @else
                    <h2 style="color: {{ $cardinfo->header_text_color ?? '#ffffff' }};">
                        <span>{{ $cardinfo->title }}</span>
                    </h2>
                @endif
                <div class="float-end">
                    <a class="gallery-btn" data-bs-toggle="modal" data-bs-target="#galleryModal"
                        href="javascript:void(0)" style="color: {{ $cardinfo->header_text_color ?? '#ffffff' }};">
                        <i class="fas fa-images"></i>
                    </a>
                    <a class="login_btn" data-bs-toggle="modal" data-bs-target="#loginModal" href="javascript:void(0)"
                        style="color: {{ $cardinfo->header_text_color ?? '#ffffff' }};">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24"
                            fill="none" stroke="{{ $cardinfo->header_text_color ?? '#ffffff' }}" stroke-width="1"
                            stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg>
                    </a>
                </div>
            </div>

            @if ($cardinfo->card_status == 'activated')

                @if (!empty($cardinfo->banner_content))
                    @if ($cardinfo->banner_type == 'videourl')
                        <div class="video_wrapper">
                            <div class="ratio ratio-1x1">
                                <iframe src="{{ $cardinfo->banner_content }}" width="100%" frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    @elseif ($cardinfo->banner_type == 'videosource')
                        <!-- Video -->
                        <div class="video_wrapper">
                            <div class="ratio ratio-1x1">
                                <video data-wf-ignore="true" data-object-fit="cover" autoplay="" loop=""
                                    muted="" playsinline="" controls>
                                    <source src="{{ $cardinfo->banner_content }}" type="video/mp4">
                                    <source src="{{ $cardinfo->banner_content }}" type="video/ogg">
                                </video>
                            </div>
                        </div>
                    @elseif ($cardinfo->banner_type == 'banner')
                        <div class="carousel-inner">
                            <img class="d-block w-100" src="{{ $cardinfo->banner_content }}" alt="image">
                        </div>
                    @endif
                @endif
                <!-- purchase button -->
                {{-- <div class="purchase_btn text-center mb-4">
@if (!empty($cardinfo->website))
<a href="{{ $cardinfo->website }}">SHOP</a>
@endif
</div> --}}
                <div class="purchase_btn save_contact">
                    <a class="text-decoration-none save-contact d-inline-block"
                        href="{{ route('download.vCard', $cardinfo->card_id) }}">Save Contact</a>
                    @if (isset($store_details->card_url) && $cardinfo->is_store_show == 1)
                        <a class="text-decoration-none d-inline-block btn-secondary"
                            href="{{ URL::to('/') . '/' . $store_details->card_url }}" target="_blank">
                            {{ $store_details->shop_link_name ?? 'SHOP' }}
                        </a>
                    @endif
                </div>
                <!-- social medai -->
                <div class="social_wrapper mb-3">
                    <div class="section_heading text-center mb-3">
                        <h4>Connect With Me</h4>
                    </div>

                    <div class="social_wrapper">
                        <div class="row row-cols-4 row-cols-sm-5 g-3">
                            <!-- social icon -->
                            @if (!empty($cardinfo->phone_number))
                                <div class="col">
                                    <div class="social_item">
                                        <a href="tel:{{ $cardinfo->phone_number }}">
                                            <i class="fa fa-phone"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="social_item">
                                        <a href="sms://{{ $cardinfo->phone_number }}">
                                            <i class="fa fa-comment"></i>
                                        </a>
                                    </div>
                                </div>
                            @endif
                            @if (!empty($cardinfo->email))
                                <!-- social icon -->
                                <div class="col">
                                    <div class="social_item">
                                        <a href="mailto:{{ $cardinfo->email }}">
                                            <i class="fa fa-envelope"></i>
                                        </a>
                                    </div>
                                </div>
                            @endif

                            @if (isset($cardinfo->location))
                                <div class="col">
                                    <div class="social_item">
                                        <a href="{{ $cardinfo->location }}" target="__blank">
                                            <i class="fas fa-map-marker"></i>
                                        </a>
                                    </div>
                                </div>
                            @endif

                            <!-- Qr code icon -->
                            <div class="col">
                                <div class="social_item qrcode_icon">
                                    <a data-bs-toggle="modal" data-bs-target="#qrcodeModal" href="javascript:void(0)"
                                        target="_blank">
                                        <img src="{{ asset('assets/images/icon/qr-code.svg') }}" alt="qr-code">
                                    </a>
                                </div>
                            </div>

                            @if (isset($cardinfo->about_us))
                                <div class="col">
                                    <div class="social_item">
                                        <a data-bs-toggle="modal" data-bs-target="#aboutUsModal"
                                            href="javascript:void(0)">
                                            <i class="fas fa-user"></i>
                                        </a>
                                    </div>
                                </div>
                            @endif

                            @if (!empty($cardinfo->website))
                                <div class="col">
                                    <div class="social_item">
                                        <a href="{{ $cardinfo->website }}" target="_blank">
                                            <i class="fa fa-globe"></i>
                                        </a>
                                    </div>
                                </div>
                            @endif
                            <!-- social icon -->

                            <!-- social icon -->
                            @if (!empty($cardinfo->contacts))
                                @foreach ($cardinfo->contacts as $contact)
                                    @if ($contact->label == 'facebook')
                                        <!-- social icon -->
                                        <div class="col">
                                            <div class="social_item">
                                                <a href="{{ $contact->content }}" target="_blank">
                                                    <i class="fab fa-facebook"></i>
                                                </a>
                                            </div>
                                        </div>
                                    @elseif ($contact->label == 'instagram')
                                        <div class="col">
                                            <div class="social_item">
                                                <a href="{{ $contact->content }}" target="_blank">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif

                            {{-- <div class="col">
            <div class="social_item">
                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#SocialModal">
                    <i class="fas fa-map-marker"></i>
                </a>
            </div>
        </div> --}}
                        </div>
                    </div>
                </div>

                <!-- subscribe -->
                <div class="subscribe mb-3">
                    <form action="{{ route('card.subscriber') }}" method="post">
                        @csrf
                        <input id="" name="card_id" type="hidden" value="{{ $cardinfo->id }}">
                        <div class="input-group">
                            <input class="form-control @error('subscriber_email') is-invalid @enderror"
                                id="subscriber_email" name="subscriber_email" type="email"
                                placeholder="Enter your emaill..." required>
                            <button class="input-group-text btn btn-primary subscribe-btn"
                                type="submit">Subscribe</button>
                        </div>
                        {{-- @if ($errors->has('subscriber_email'))
    <span class="help-block text-danger d-block">{{ $errors->first('subscriber_email') }}</span>
    @endif --}}
                    </form>
                </div>

                <!-- copyright -->
                <div class="bottom_content text-center pb-3">
                    <p>CashApp: {{ $cardinfo->cashapp }}</p>
                </div>
            @else
                <div class="text-center text-light d-flex align-items-center" style="min-height: 90vh">
                    <h4>Your Bizad is currently inactive. Please activate.</h4>
                </div>

            @endif

            <div class="text-center text-light pb-3">
                @if (isFreePlan($cardinfo->user_id))
                    <p>All Rights Reserved by Digitalbizads.com</p>
                @else
                    <p>Copyright © {{ $cardinfo->footer_text }} {{ date('Y') }}.</p>
                @endif

            </div>
        </div>

    </div>

    <div class="about_us_modal email_modal">
        <div class="modal fade animate__animated animate__fadeIn" id="aboutUsModal" data-bs-backdrop="static"
            aria-labelledby="exampleModalLabel" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('About The Bussiness') }}</h5>
                        <button class="btn-close" data-bs-dismiss="modal" type="button"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal_body">
                        {{ $cardinfo->about_us ?? '' }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Qrcode Modal -->
    <div class="qrcode_modal modal fade" id="qrcodeModal" aria-labelledby="qrcodeModalLabel" aria-hidden="true"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="qrcodeModalLabel">Scan QR Code</h1>
                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="qe_code text-center">
                        {!! QrCode::size(150)->generate(url($cardinfo->card_url)) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Modal -->
    <div class="login_modal modal fade" id="loginModal" aria-labelledby="loginModalLabel" aria-hidden="true"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="loginModalLabel">Login</h1>
                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" type="text" value="{{ old('email') }}"
                                placeholder="Email Address" required>
                            @if ($errors->has('email'))
                                <span class="help-block text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input class="form-control @error('password') is-invalid @enderror" id="password"
                                name="password" type="password" placeholder="Password" required>
                            @if ($errors->has('password'))
                                <span class="help-block text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="text-center mb-3">
                            <button class="btn btn-primary" type="submit">Login</button>
                        </div>

                        <div class="dont_have_account text-center">
                            <p>Don't have an Account? <a data-bs-toggle="modal" data-bs-target="#signupModal"
                                    href="javascript:void(0)">Signup</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Social Modal modal -->
    <div class="share_modal email_modal">
        <div class="modal animate__animated animate__fadeIn" id="SocialModal" data-bs-backdrop="static"
            aria-labelledby="exampleModalLabel" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title text-uppercase">{{ __('Share my biz Ad') }}</h5>
                        <button class="btn-close" data-bs-dismiss="modal" type="button"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal_body">
                        <div class="pb-4" id="social-links">
                            <div>
                                <label class="py-2" for="send_to">Send To</label>
                                <div class="input-group">
                                    <input class="form-control @error('send_to') is-invalid @enderror" id="send_to"
                                        name="send_to" type="text" placeholder="Send to phone no" required>
                                    <a class="input-group-text btn btn-dark sendto-btn" href="sms:;">Send</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Signup Modal -->
    <div class="login_modal modal fade" id="signupModal" aria-labelledby="loginModalLabel" aria-hidden="true"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="loginModalLabel">Sign Up</h1>
                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('post-register') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="full_name">Full Name</label>
                            <input class="form-control @error('reg_name') is-invalid @enderror" id="full_name"
                                name="reg_name" type="text" value="{{ old('reg_name') }}"
                                placeholder="Full Name" required>
                            @if ($errors->has('reg_name'))
                                <span class="help-block text-danger">{{ $errors->first('reg_name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="user_email">Email</label>
                            <input class="form-control @error('user_email') is-invalid @enderror" id="user_email"
                                name="reg_email" type="email" value="{{ old('user_email') }}"
                                placeholder="Email Address" required>
                            @if ($errors->has('reg_email'))
                                <span class="help-block text-danger">{{ $errors->first('reg_email') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="reg_password">Password</label>
                            <input class="form-control @error('reg_password') is-invalid @enderror" id="reg_password"
                                name="reg_password" type="password" value="{{ old('reg_password') }}"
                                placeholder="Password" required>
                            @if ($errors->has('reg_password'))
                                <span class="help-block text-danger">{{ $errors->first('reg_password') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="reg_password_confirmation">Confirm Password</label>
                            <input class="form-control @error('reg_password_confirmation') is-invalid @enderror"
                                id="reg_password_confirmation" name="reg_password_confirmation" type="password"
                                value="{{ old('reg_password_confirmation') }}" placeholder="Password" required>
                            @if ($errors->has('reg_password_confirmation'))
                                <span
                                    class="help-block text-danger">{{ $errors->first('reg_password_confirmation') }}</span>
                            @endif
                        </div>
                        <div class="text-center mb-3">
                            <button class="btn btn-primary" type="submit">Sign up</button>
                        </div>
                        <div class="dont_have_account text-center">
                            <p>Already have an Account? <a data-bs-toggle="modal" data-bs-target="#loginModal"
                                    href="javascript:void(0)">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="galleryModal" aria-labelledby="galleryModalLabel" aria-hidden="true"
        tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content pb-0">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="galleryModalLabel">Gallery</h1>
                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                </div>
                <div class="product-item__gallery single_product">
                    <div class="swiper mySwiper2">
                        <div class="swiper-wrapper single_item">
                            @if (!empty($cardinfo->gallery))
                                @foreach ($cardinfo->gallery as $key => $gallery)
                                    <div class="swiper-slide {{ $key == 0 ? 'swiper-slide-active' : '' }}">
                                        <img src="{{ asset($gallery->content) }}" alt="product-img" />
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div class="swiper mySwiper" style="height: 125px" thumbsSlider="">
                        <div class="swiper-wrapper">
                            @if (!empty($cardinfo->gallery))
                                @foreach ($cardinfo->gallery as $key => $gallery)
                                    <div class="swiper-slide {{ $key == 0 ? 'swiper-slide-thumb-active' : '' }}">
                                        <img src="{{ asset($gallery->content) }}" alt="product-img" />
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- js file -->
    @include('sweet::alert')
    {{-- <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>

    <script>
        "use strict";
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
        $(document).on('input', '#send_to', function(e) {
            var value = $(this).val();
            var CurrentBrowseurl = document.location.href;
            var user_agent = navigator.userAgent.toLowerCase();
            var url;
            if (user_agent.indexOf("iphone") > -1 || user_agent.indexOf("ipad") > -1)
                url = "sms:" + value + ";body=" + encodeURIComponent(CurrentBrowseurl);
            else
                url = "sms:" + value + "?body=" + encodeURIComponent(CurrentBrowseurl);
            $('.sendto-btn').attr('href', url);
        })
    </script>
</body>

</html>
