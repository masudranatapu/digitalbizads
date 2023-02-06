<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Developed By" content="Arobil limited" />
    <meta name="Designer" content="Rabin Mia" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    {{-- <link rel="icon" type="image/png" sizes="32x32" href="{{ asset($cardinfo->logo) }}"> --}}
    <link rel="icon" href="{{ $settings->favicon }}" sizes="96x96" type="image/png" />

    <!-- css file -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
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
            background-color: rgba({{ $theme_bg }});
        }

        .social_item i {
            border-color: {{ $theme_color }}
        }

        .card_title,
        .subscribe-btn,
        .purchase_btn a,
        .carousel-control-prev,
        .carousel-control-next,
        .purchase_btn a {
            background-color: {{ $theme_color . '!important' }};
        }

        .card_template .card_title {
            padding: 9px 0px 9px 0px;
            background: #eb8714;
        }

        .social_share {
            margin-bottom: 20px;
        }

        .social_share img {
            width: 75%;
            height: 75%;
        }
    </style>
</head>

<body>
    <div class="card_wrapper">
        <div class="card_template">
            <!-- title -->
            <div class="card_title">
                @if (!empty($cardinfo->logo))
                    <h2>
                        <div class="text-center">
                            <img src="{{ asset($cardinfo->logo) }}" alt="logo">
                        </div>
                        <a href="javascript:void(0)" class="float-end login_btn" data-bs-toggle="modal"
                            data-bs-target="#loginModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24"
                                fill="none" stroke="#000000" stroke-width="1" stroke-linecap="round"
                                stroke-linejoin="round">
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </a>
                    </h2>
                @else
                    <h2>
                        <span>{{ $cardinfo->title }}</span>
                        <a href="javascript:void(0)" class="float-end login_btn" data-bs-toggle="modal"
                            data-bs-target="#loginModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24"
                                fill="none" stroke="#000000" stroke-width="1" stroke-linecap="round"
                                stroke-linejoin="round">
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </a>
                    </h2>
                @endif
            </div>
            @if (!empty($cardinfo->gallery[0]))
                @if ($cardinfo->gallery[0]->gallery_type == 'videourl')
                    <div class="video_wrapper">
                        <div class="ratio ratio-1x1">
                            <iframe width="100%" src="{{ $cardinfo->gallery[0]->content }}" frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                @elseif ($cardinfo->gallery[0]->gallery_type == 'videosource')
                    <!-- Video -->
                    <div class="video_wrapper">
                        <div class="ratio ratio-1x1">
                            <video autoplay="" loop="" muted="" playsinline="" data-wf-ignore="true"
                                data-object-fit="cover" controls>
                                <source src="{{ $cardinfo->gallery[0]->content }}" type="video/mp4">
                                <source src="{{ $cardinfo->gallery[0]->content }}" type="video/ogg">
                            </video>
                        </div>
                    </div>
                @elseif ($cardinfo->gallery[0]->gallery_type == 'gallery')
                    <div class="carousel_slider">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($cardinfo->gallery as $key => $gallery)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img src="{{ asset($gallery->content) }}" class="d-block w-100"
                                            alt="image">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                        </div>
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
                                {{--
                        <div class="col">
                            <div class="social_item">
                                <a href="{{ $cardinfo->contacts }}" target="_blank">
                                    <i class="fa fa-comment"></i>
                                </a>
                            </div>
                        </div> --}}

                                @if ($contact->label == 'facebook')
                                    <!-- social icon -->
                                    <div class="col">
                                        <div class="social_item">
                                            <a href="https://www.facebook.com/{{ $contact->content }}"
                                                target="_blank">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        </div>
                                    </div>
                                @elseif ($contact->label == 'instagram')
                                    <div class="col">
                                        <div class="social_item">
                                            <a href="https://www.instagram.com/{{ $contact->content }}"
                                                target="_blank">
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
                        <input type="text" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="Enter your emaill..." required>
                        @if ($errors->has('email'))
                            <span class="help-block text-danger d-block">{{ $errors->first('email') }}</span>
                        @endif
                        <button type="submit"
                            class="input-group-text btn btn-primary subscribe-btn">Subscribe</button>
                    </div>
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
                            <label class="form-label" for="username">Username or Email</label>
                            <input type="text" name="username" id="username" value="{{ old('username') }}"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Username or Email Address" required>
                            @if ($errors->has('username'))
                                <span class="help-block text-danger">{{ $errors->first('username') }}</span>
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
        <div class="modal animate__animated animate__fadeIn" id="SocialModal" tabindex="-1"
            data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Share your Ad') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal_body">
                        <div id="social-links">
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <ul class="text-center">
                                        <li class="list-inline-item">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}"
                                                target="_blank" class="social_share"
                                                data-url="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}"
                                                title="{{ __('Share on Facebook') }}">
                                                <img class="img-fluid"
                                                    src="{{ asset('images/icons/social/facebook.svg') }}"
                                                    alt="{{ __('Share on facebook') }}">
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://twitter.com/intent/tweet?text=Hello%21+This+is+my+vCard.&amp;url={{ Request::url() }}"
                                                target="_blank" class="social_share"
                                                data-url="https://twitter.com/intent/tweet?text=Hello%21+This+is+my+vCard.&amp;url={{ Request::url() }}
                                            "
                                                title="{{ __('Share on Twitter') }}">
                                                <img class="img-fluid"
                                                    src="{{ asset('images/icons/social/twitter.svg') }}"
                                                    alt="">
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://telegram.me/share/url?url={{ Request::url() }}&text="
                                                target="_blank" class="social_share"
                                                data-url="https://telegram.me/share/url?url={{ Request::url() }}&text="
                                                title="{{ __('Share on Telegram') }}">
                                                <img class="img-fluid"
                                                    src="{{ asset('images/icons/social/telegram.svg') }}"
                                                    alt="">
                                            </a>
                                        </li>

                                        @if ($android !== false || $ipad !== false || $iphone !== false || true)
                                            <li class="list-inline-item">
                                                <a href="whatsapp://send?text={{ Request::url() }}"
                                                    class="social_share whatsapp"
                                                    title="{{ __('Share on Whatsapp') }}"
                                                    data-action="share/whatsapp/share">
                                                    <img class="img-fluid"
                                                        src="{{ asset('images/icons/social/whatsapp.svg') }}"
                                                        alt="">
                                                </a>
                                            </li>
                                        @else
                                            <li class="list-inline-item">
                                                <a href="https://web.whatsapp.com/send?text={{ Request::url() }}"
                                                    target="__blank" class="whatsapp"
                                                    title="{{ __('Share on Whatsapp') }}"
                                                    data-action="share/whatsapp/share">
                                                    <img class="img-fluid"
                                                        src="{{ asset('assets/img/icons/whatsapp.svg') }}"
                                                        alt="">
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
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
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="username">Username</label>
                            <input type="text" name="username" id="username" value="{{ old('username') }}"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Username"
                                required>
                            @if ($errors->has('username'))
                                <span class="help-block text-danger">{{ $errors->first('username') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Email Address"
                                required>
                            @if ($errors->has('email'))
                                <span class="help-block text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" name="password" value="{{ old('password') }}" id="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                                required>
                            @if ($errors->has('password'))
                                <span class="help-block text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="confimation_password">Confirm Password</label>
                            <input type="password" name="confimation_password"
                                value="{{ old('confimation_password') }}" id="confimation_password"
                                class="form-control @error('confimation_password') is-invalid @enderror"
                                placeholder="Password" required>
                            @if ($errors->has('confimation_password'))
                                <span
                                    class="help-block text-danger">{{ $errors->first('confimation_password') }}</span>
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
    <!-- js file -->
    @include('sweet::alert')

    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>

</html>
