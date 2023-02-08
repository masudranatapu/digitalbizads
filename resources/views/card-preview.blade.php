<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Developed By" content="Arobil limited" />
    <meta name="Designer" content="Rabin Mia" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    {{--
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset($cardinfo->logo) }}"> --}}
    <link rel="icon" href="{{ $settings->favicon }}" sizes="96x96" type="image/png" />
    <!-- css file -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
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
    $theme_bg = "$r, $g, $b,.1";
    $android = stripos($_SERVER['HTTP_USER_AGENT'], 'android');
    $iphone = stripos($_SERVER['HTTP_USER_AGENT'], 'iphone');
    $ipad = stripos($_SERVER['HTTP_USER_AGENT'], 'ipad');

    ?>
    <style>
        .card_template {
            background-color: rgba( {
                        {
                        $theme_bg
                    }
                }

            );
        }

        .social_item i {
            border-color: {
                    {
                    $theme_color
                }
            }
        }

        /* .card_title, */
        .subscribe-btn,
        .purchase_btn a,
        .carousel-control-prev,
        .carousel-control-next,
        .purchase_btn a {
            background-color: {
                    {
                    $theme_color . '!important'
                }
            }

            ;
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
    </style>
</head>

<body>
    <div class="card_wrapper">
        <div class="card_template">
            <!-- title -->
            <div class="card_title" style="background-color: {{ $cardinfo->header_backgroung ?? '#000000' }};">
                @if (!empty($cardinfo->logo))
                <h2>
                    <div class="text-center">
                        <img src="{{ asset($cardinfo->logo) }}" alt="logo">
                    </div>
                </h2>
                @else
                <h2 style="color: {{ $cardinfo->header_text_color ?? '#ffffff' }};">
                    <span>{{ $cardinfo->title }}</span>
                </h2>

                @endif
                <div class="float-end">
                    <a href="javascript:void(0)" style="color: {{ $cardinfo->header_text_color ?? '#ffffff' }};" class="gallery-btn" data-bs-toggle="modal"
                        data-bs-target="#galleryModal">
                        <i class="fas fa-images"></i>
                    </a>
                    <a style="color: {{ $cardinfo->header_text_color ?? '#ffffff' }};" href="javascript:void(0)" class="login_btn" data-bs-toggle="modal" data-bs-target="#loginModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none"
                            stroke="{{ $cardinfo->header_text_color ?? '#ffffff' }}" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg>
                    </a>
                </div>
            </div>


            @if (!empty($cardinfo->banner_content))
            @if ($cardinfo->banner_type == 'videourl')
            <div class="video_wrapper">
                <div class="ratio ratio-1x1">
                    <iframe width="100%" src="{{ $cardinfo->banner_content}}" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
            @elseif ($cardinfo->banner_type == 'videosource')
            <!-- Video -->
            <div class="video_wrapper">
                <div class="ratio ratio-1x1">
                    <video autoplay="" loop="" muted="" playsinline="" data-wf-ignore="true" data-object-fit="cover"
                        controls>
                        <source src="{{ $cardinfo->banner_content}}" type="video/mp4">
                        <source src="{{ $cardinfo->banner_content}}" type="video/ogg">
                    </video>
                </div>
            </div>
            @elseif ($cardinfo->banner_type == 'banner')
            <div class="carousel-inner">
                <img src="{{ $cardinfo->banner_content }}" class="d-block w-100" alt="image">
            </div>
            @endif
            @endif
            <!-- purchase button -->
            <div class="purchase_btn text-center mb-4">
                @if (!empty($cardinfo->website))
                <a href="{{ $cardinfo->website }}">SHOP</a>
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
                        <!-- Qr code icon -->
                        <div class="col">
                            <div class="social_item qrcode_icon">
                                <a href="javascript:void(0)" target="_blank" data-bs-toggle="modal"
                                    data-bs-target="#qrcodeModal">
                                    <img src="{{ asset('assets/images/icon/qr-code.svg') }}" alt="qr-code">
                                </a>
                            </div>
                        </div>

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
                                <a href="https://www.facebook.com/{{ $contact->content }}" target="_blank">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            </div>
                        </div>
                        @elseif ($contact->label == 'instagram')
                        <div class="col">
                            <div class="social_item">
                                <a href="https://www.instagram.com/{{ $contact->content }}" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @endif

                        <div class="col">
                            <div class="social_item">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#SocialModal">
                                    <i class="fas fa-share-nodes"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- subscribe -->
            <div class="subscribe mb-3">
                <form action="{{ route('card.subscriber') }}" method="post">
                    @csrf
                    <input type="hidden" id="" name="card_id" value="{{ $cardinfo->id }}">
                    <div class="input-group">
                        <input type="email" name="subscriber_email" id="subscriber_email"
                            class="form-control @error('subscriber_email') is-invalid @enderror" placeholder="Enter your emaill..."
                            required>
                        <button type="submit" class="input-group-text btn btn-primary subscribe-btn">Subscribe</button>
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
            <div class="text-center text-light pb-3">
                <p>Copyright © {{ $cardinfo->footer_text }}</p>
            </div>
        </div>

    </div>

    <!-- Qrcode Modal -->
    <div class="qrcode_modal modal fade" id="qrcodeModal" tabindex="-1" aria-labelledby="qrcodeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="qrcodeModalLabel">Scan QR Code</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
    <div class="login_modal modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="loginModalLabel">Login</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input type="text" name="email" id="email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Email Address" required>
                            @if ($errors->has('email'))
                            <span class="help-block text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                                required>
                            @if ($errors->has('password'))
                            <span class="help-block text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="text-center mb-3">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>

                        <div class="dont_have_account text-center">
                            <p>Don't have an Account? <a href="javascript:void(0)" data-bs-toggle="modal"
                                    data-bs-target="#signupModal">Signup</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- Social Modal modal -->
    <div class="share_modal email_modal">
        <div class="modal animate__animated animate__fadeIn" id="SocialModal" tabindex="-1" data-bs-backdrop="static"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title text-uppercase">{{ __('Share my biz Ad') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal_body">
                        <div class="pb-4" id="social-links">
                            <div>
                                @if ($android !== false || $ipad !== false || $iphone !== false)
                                    @php
                                        $sms_attr ="sms:?body=".URL::to('/');
                                    @endphp
                                @else
                                    @php
                                        $sms_attr ="sms:;body=".URL::to('/');
                                    @endphp
                                @endif
                                <label class="py-2" for="send_to">Send To</label>
                                <div class="input-group">
                                    <input type="text" name="send_to" id="send_to"
                                            class="form-control @error('send_to') is-invalid @enderror" placeholder="Send to phone no"
                                            required>
                                    <a href="{{ $sms_attr }}"  class="input-group-text btn btn-dark sendto-btn">Send</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Signup Modal -->
    <div class="login_modal modal fade" id="signupModal" tabindex="-1" aria-labelledby="loginModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="loginModalLabel">Sign Up</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('post-register') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="full_name">Full Name</label>
                            <input type="text" name="reg_name" id="full_name" value="{{ old('reg_name') }}"
                                class="form-control @error('reg_name') is-invalid @enderror" placeholder="Full Name"
                                required>
                            @if ($errors->has('reg_name'))
                            <span class="help-block text-danger">{{ $errors->first('reg_name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="user_email">Email</label>
                            <input type="email" name="reg_email" id="user_email" value="{{ old('user_email') }}"
                                class="form-control @error('user_email') is-invalid @enderror" placeholder="Email Address"
                                required>
                            @if ($errors->has('reg_email'))
                            <span class="help-block text-danger">{{ $errors->first('reg_email') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="reg_password">Password</label>
                            <input type="password" name="reg_password" value="{{ old('reg_password') }}" id="reg_password"
                                class="form-control @error('reg_password') is-invalid @enderror" placeholder="Password"
                                required>
                            @if ($errors->has('reg_password'))
                            <span class="help-block text-danger">{{ $errors->first('reg_password') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="reg_password_confirmation">Confirm Password</label>
                            <input type="password" name="reg_password_confirmation" value="{{ old('reg_password_confirmation') }}"
                                id="reg_password_confirmation"
                                class="form-control @error('reg_password_confirmation') is-invalid @enderror"
                                placeholder="Password" required>
                            @if ($errors->has('reg_password_confirmation'))
                            <span class="help-block text-danger">{{ $errors->first('reg_password_confirmation') }}</span>
                            @endif
                        </div>
                        <div class="text-center mb-3">
                            <button type="submit" class="btn btn-primary">Sign up</button>
                        </div>
                        <div class="dont_have_account text-center">
                            <p>Already have an Account? <a href="javascript:void(0)" data-bs-toggle="modal"
                                    data-bs-target="#loginModal">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content pb-0">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="galleryModalLabel">Gallery</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="product-item__gallery single_product">
                    <div class="swiper mySwiper2">
                        <div class="swiper-wrapper single_item">
                            @if (!empty($cardinfo->gallery))
                            @foreach ($cardinfo->gallery as $key=> $gallery)
                            <div class="swiper-slide {{ $key==0 ? 'swiper-slide-active' : '' }}">
                                <img src="{{asset($gallery->content)}}" alt="product-img" />
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div thumbsSlider="" class="swiper mySwiper" style="height: 125px">
                        <div class="swiper-wrapper">
                            @if (!empty($cardinfo->gallery))
                            @foreach ($cardinfo->gallery as $key=> $gallery)
                            <div class="swiper-slide {{ $key==0 ? 'swiper-slide-thumb-active' : '' }}">
                                <img src="{{asset($gallery->content)}}" alt="product-img" />
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
        $(document).on('input','#send_to',function(e){
            var value = $(this).val();
            var CurrentBrowseurl = document.location.href;
            var user_agent = navigator.userAgent.toLowerCase();
            var url;
            if (user_agent.indexOf("iphone") > -1 || user_agent.indexOf("ipad") > -1)
            url = "sms:"+value+";body=" + encodeURIComponent(CurrentBrowseurl);
            else
            url = "sms:"+value+"?body=" + encodeURIComponent(CurrentBrowseurl);
            $('.sendto-btn').attr('href',url);
        })
    </script>
</body>

</html>
