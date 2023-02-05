@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])
@section('content')

    <?php
    $tabindex = 1;
    $android = stripos($_SERVER['HTTP_USER_AGENT'], 'android');
    $iphone = stripos($_SERVER['HTTP_USER_AGENT'], 'iphone');
    $ipad = stripos($_SERVER['HTTP_USER_AGENT'], 'ipad');
    if (!empty($card->gallery[0])) {
        if ($card->gallery[0]['gallery_type'] == 'gallery') {
            $gallery_type = 'gallery';
        } elseif ($card->gallery[0]['gallery_type'] == 'videourl') {
            $gallery_type = 'videourl';
        } elseif ($card->gallery[0]['gallery_type'] == 'videosource') {
            $gallery_type = 'videosource';
        }
    } else {
        $gallery_type = 'gallery';
    }

    if (old('theme_coloe')) {
        $theme_color = old('theme_coloe');
    } elseif (!empty($card->theme_color)) {
        $theme_color = $card->theme_color;
    } else {
        $theme_color = '#ffc107';
    }
    [$r, $g, $b] = sscanf($theme_color, '#%02x%02x%02x');
    $theme_bg = "$r, $g, $b,.1";

    // dd($card);

    ?>
@section('css')
    <style>
        span.error {
            color: #E53935;
            padding: 2px 0px;
        }

        .purchase_btn a {
            padding: 10px 27px;
            font-size: 20px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            color: #ffffff;
            letter-spacing: 1px;
            text-transform: uppercase;
            display: block;
            background: #ffc107;
            transition: all 0.3s ease-in-out;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
        }

        .card_title {
            background-color: {{ $theme_color }};

        }

        a.social-contact.disabled {
            opacity: .3;
        }

        .social_item i {
            border-color: {{ $theme_color }}
        }

        .carousel-control-prev,
        .carousel-control-next {
            background-color: {{ $theme_color . '!important' }};
        }

        .social_share {
            margin-bottom: 20px;
        }

        .social_share img {
            width: 75%;
            height: 75%;
        }

        .modal-header .btn-close {
            width: 25px;
            height: 25px;
        }
    </style>
@endsection
<div class="page-wrapper">
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        {{ __('Overview') }}
                    </div>
                    <h2 class="page-title">
                        {{ __('Edit Biz Ad') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-md-5 col-xl-5">
                    <div class="card_preview_sec">
                        <div class="card_wrapper">
                            <div class="card_template" style="background-color: rgba({{ $theme_bg }})">
                                <!-- title -->
                                @if (!empty($card->logo))
                                    <div class="card_title p-2 pt-3" id="logoDiv">
                                        <h2>
                                            <div class="text-center">
                                                <img src="{{ asset($card->logo) }}" id="previewLogo" alt="logo">
                                            </div>
                                            <a href="javascript:void(0)" class="float-end login_btn"
                                                data-bs-toggle="modal" data-bs-target="#loginModal">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                                    viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <line x1="3" y1="12" x2="21" y2="12">
                                                    </line>
                                                    <line x1="3" y1="6" x2="21" y2="6">
                                                    </line>
                                                    <line x1="3" y1="18" x2="21" y2="18">
                                                    </line>
                                                </svg>
                                            </a>
                                        </h2>
                                    </div>
                                    <div class="card_title p-2 pt-3 d-none" id="titleDiv">
                                        <h2 class="">
                                            <span id="preview_name">Express T-Shirts</span>
                                            <a href="javascript:void(0)" class="float-end login_btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                                    viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <line x1="3" y1="12" x2="21" y2="12">
                                                    </line>
                                                    <line x1="3" y1="6" x2="21" y2="6">
                                                    </line>
                                                    <line x1="3" y1="18" x2="21" y2="18">
                                                    </line>
                                                </svg>
                                            </a>
                                        </h2>
                                    </div>
                                @else
                                    <div class="card_title p-2 pt-3 d-none" id="logoDiv">
                                        <h2>
                                            <div class="text-center">
                                                <img src="{{ asset('assets/images/bizads.png') }}" width="140"
                                                    id="previewLogo" alt="logo">
                                            </div>
                                            <a href="javascript:void(0)" class="float-end login_btn"
                                                data-bs-toggle="modal" data-bs-target="#loginModal">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                                    viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <line x1="3" y1="12" x2="21" y2="12">
                                                    </line>
                                                    <line x1="3" y1="6" x2="21" y2="6">
                                                    </line>
                                                    <line x1="3" y1="18" x2="21"
                                                        y2="18"></line>
                                                </svg>
                                            </a>
                                        </h2>
                                    </div>
                                    <div class="card_title p-2 pt-3" id="titleDiv">
                                        <h2>
                                            <span id="preview_name">{{ $card->title }}</span>
                                            <a href="javascript:void(0)" class="float-end login_btn"
                                                data-bs-toggle="modal" data-bs-target="#loginModal">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                                    viewBox="0 0 24 24" fill="none" stroke="#000000"
                                                    stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                                    <line x1="3" y1="12" x2="21"
                                                        y2="12"></line>
                                                    <line x1="3" y1="6" x2="21"
                                                        y2="6"></line>
                                                    <line x1="3" y1="18" x2="21"
                                                        y2="18"></line>
                                                </svg>
                                            </a>
                                        </h2>
                                    </div>
                                @endif


                                <div class="slider-box" id="slider-box">

                                    @if (!empty($card->gallery[0]))
                                        @if ($card->gallery[0]->gallery_type == 'videourl')
                                            <div class="video_wrapper" id="digitalBizEmbad">
                                                <div class="ratio ratio-1x1">
                                                    <iframe width="100%" src="{{ $card->gallery[0]->content }}"
                                                        frameborder="0"
                                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                        allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        @elseif ($card->gallery[0]->gallery_type == 'videosource')
                                            <!-- Video -->
                                            <div class="video_wrapper" id="digitaBizSourc">
                                                <div class="ratio ratio-1x1">
                                                    <video autoplay="" loop="" muted=""
                                                        playsinline="" data-wf-ignore="true" data-object-fit="cover"
                                                        controls>
                                                        <source src="{{ $card->gallery[0]->content }}"
                                                            type="video/mp4">
                                                        <source src="{{ $card->gallery[0]->content }}"
                                                            type="video/ogg">
                                                    </video>
                                                </div>
                                            </div>
                                        @elseif ($card->gallery[0]->gallery_type == 'gallery')
                                            <div class="carousel_slider" id="digitalbizSlider">
                                                <div id="carouselExampleControls" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        @foreach ($card->gallery as $key => $gallery)
                                                            <div
                                                                class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                                <img src="{{ asset($gallery->content) }}"
                                                                    class="d-block w-100" alt="image">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#carouselExampleControls"
                                                        data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon"
                                                            aria-hidden="true"></span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#carouselExampleControls"
                                                        data-bs-slide="next">
                                                        <span class="carousel-control-next-icon"
                                                            aria-hidden="true"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                    @else
                                        <!-- slider -->
                                        <div class="carousel_slider" id="digitalbizSlider">
                                            <div id="carouselExampleControls" class="carousel slide"
                                                data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="{{ asset('backend/img') }}/1.jpg"
                                                            class="d-block w-100" alt="image">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="{{ asset('backend/img') }}/2.jpg"
                                                            class="d-block w-100" alt="image">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="{{ asset('backend/img') }}/3.jpg"
                                                            class="d-block w-100" alt="image">
                                                    </div>
                                                </div>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                        height="25" viewBox="0 0 24 24" fill="none"
                                                        stroke="#212121" stroke-width="1" stroke-linecap="butt"
                                                        stroke-linejoin="bevel">
                                                        <path d="M19 12H6M12 5l-7 7 7 7"></path>
                                                    </svg>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                        height="25" viewBox="0 0 24 24" fill="none"
                                                        stroke="#212121" stroke-width="1" stroke-linecap="butt"
                                                        stroke-linejoin="bevel">
                                                        <path d="M5 12h13M12 5l7 7-7 7"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="video_wrapper d-none" id="digitalBizEmbad">
                                        <div class="ratio ratio-1x1">
                                            <iframe width="100%" height="315" id="youtube_video_preview"
                                                src="https://www.youtube.com/embed/Fhskvloj1gE"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="video_wrapper d-none" id="digitaBizSourc">
                                        <div class="ratio ratio-1x1">
                                            <video autoplay="" loop="" muted="" playsinline=""
                                                id="video_preview" data-wf-ignore="true" data-object-fit="cover"
                                                controls>
                                                <source src="{{ asset('assets/video.mp4') }}" type="video/mp4">
                                                <source src="{{ asset('assets/video.mp4') }}" type="video/ogg">
                                            </video>
                                        </div>
                                    </div>
                                    <div class="carousel_slider d-none" id="digitalbizSlider">
                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="{{ asset('backend/img') }}/1.jpg" class="d-block w-100"
                                                        alt="image">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="{{ asset('backend/img') }}/2.jpg" class="d-block w-100"
                                                        alt="image">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="{{ asset('backend/img') }}/3.jpg" class="d-block w-100"
                                                        alt="image">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                    viewBox="0 0 24 24" fill="none" stroke="#212121"
                                                    stroke-width="1" stroke-linecap="butt" stroke-linejoin="bevel">
                                                    <path d="M19 12H6M12 5l-7 7 7 7"></path>
                                                </svg>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                    viewBox="0 0 24 24" fill="none" stroke="#212121"
                                                    stroke-width="1" stroke-linecap="butt" stroke-linejoin="bevel">
                                                    <path d="M5 12h13M12 5l7 7-7 7"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>


                                </div>

                                <!-- purchase button -->
                                <div class="purchase_btn text-center mb-4">
                                    <a href="{{ $card->website }}"
                                        style="background-color: {{ $theme_color }} ">SHOP</a>
                                </div>

                                <!-- social medai -->
                                <div class="social_wrapper mb-3">
                                    <div class="section_heading text-center mb-3">
                                        <h4>Connect With Me</h4>
                                    </div>

                                    <div class="social_wrapper">
                                        <div class="row row-cols-4 row-cols-sm-5 g-3">
                                            <!-- social icon -->
                                            @if (!empty($card->phone_number))
                                                <div class="col">
                                                    <div class="social_item">
                                                        <a class="social-contact phone_number"
                                                            href="tel:{{ $card->phone_number }}">
                                                            <i class="fa fa-phone"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="social_item">
                                                        <a href="sms://{{ $card->phone_number }}">
                                                            <i class="fa fa-comment"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif
                                            @if (!empty($card->email))
                                                <!-- social icon -->
                                                <div class="col">
                                                    <div class="social_item">
                                                        <a class="social-contact user_email"
                                                            href="mailto:{{ $card->email }}">
                                                            <i class="fa fa-envelope"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif
                                            <!-- Qr code icon -->
                                            <div class="col">
                                                <div class="social_item qrcode_icon">
                                                    <a href="javascript:void(0)" target="_blank"
                                                        data-bs-toggle="modal" data-bs-target="#qrcodeModal">
                                                        <img src="{{ asset('assets/images/icon/qr-code.svg') }}"
                                                            alt="qr-code">
                                                    </a>
                                                </div>
                                            </div>

                                            @if (!empty($card->website))
                                                <div class="col">
                                                    <div class="social_item">
                                                        <a class="social-contact website" href="{{ $card->website }}"
                                                            target="_blank">
                                                            <i class="fa fa-globe"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif
                                            <!-- social icon -->

                                            <!-- social icon -->
                                            @if (!empty($card->contacts))
                                                @foreach ($card->contacts as $contact)
                                                    {{--
                                            <div class="col">
                                                <div class="social_item">
                                                    <a href="{{ $card->contacts }}" target="_blank">
                                                        <i class="fa fa-comment"></i>
                                                    </a>
                                                </div>
                                            </div> --}}

                                                    @if ($contact->label == 'facebook')
                                                        <!-- social icon -->
                                                        <div class="col">
                                                            <div class="social_item">
                                                                <a class="social-contact facebook"
                                                                    href="https://www.facebook.com/{{ $contact->content }}"
                                                                    target="_blank">
                                                                    <i class="fab fa-facebook"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @elseif ($contact->label == 'instagram')
                                                        <div class="col">
                                                            <div class="social_item">
                                                                <a class="social-contact instagram"
                                                                    href="https://www.instagram.com/{{ $contact->content }}"
                                                                    target="_blank">
                                                                    <i class="fab fa-instagram"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                                <div class="col">
                                                    <div class="social_item">
                                                        <a href="javascript:void(0)" class="social-contact share"
                                                            data-bs-toggle="modal" data-bs-target="#SocialModal">
                                                            <i class="fas fa-share-nodes"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- subscribe -->
                                <div class="subscribe mb-3">
                                    <form action="#" method="post">
                                        <div class="input-group">
                                            <input type="text" name="email" id="email" class="form-control"
                                                placeholder="Enter your emaill..." required="">
                                            <button type="submit"
                                                class="input-group-text btn btn-primary subscribe-btn"
                                                style="background-color: {{ $theme_color }}">Subscribe</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- copyright -->
                                <div class="bottom_content text-center pb-3">
                                    <p>CashApp: <span id="preview_cashapp">{{ $card->cashapp }}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-xl-7">
                    <div class="card card_form">
                        <div class="card-body">
                            <form action="{{ route('user.card.update', $card->id) }}" method="post" id="card-form"
                                novalidate="novalidate" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3 form-input">
                                            <label for="adsname" class="form-label">Biz Ads Name <span
                                                    class="text-danger">*</span></label></label>
                                            <input type="text" placeholder="ads name" name="adsname"
                                                id="adsname"
                                                class="form-control @error('adsname') is-invalid @enderror"
                                                tabindex="{{ $tabindex++ }}" value="{{ $card->adsname }}"
                                                required>
                                            @if ($errors->has('adsname'))
                                                <span
                                                    class="help-block text-danger">{{ $errors->first('adsname') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3 form-input" id="textfield">
                                            <label for="color" class="form-label">Biz Ad Color</label>
                                            <input type="color" placeholder="card color" name="theme_color"
                                                id="theme_color"
                                                class="form-control @error('theme_color') is-invalid @enderror"
                                                tabindex="{{ $tabindex++ }}" value="{{ $card->theme_color }}"
                                                required>
                                            @if ($errors->has('color'))
                                                <span
                                                    class="help-block text-danger">{{ $errors->first('color') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3 form-input">
                                            <label for="selectField1" class="form-label">Select Logo/Heading <span
                                                    class="text-danger">*</span></label></label>
                                            <select id="selectField1" name="headline" class="form-control"
                                                tabindex="{{ $tabindex++ }}" required>
                                                <option value="text"
                                                    @if (!empty($card->title)) selected @endif>Heading</option>
                                                <option value="logo"
                                                    @if (!empty($card->logo)) selected @endif>Logo</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3 form-input" id="headline">
                                            <label for="text" class="form-label">Heading</label>
                                            <input type="text" placeholder="ads heading" name="text"
                                                id="text" data-preview="preview_name" data-concat="preview_name"
                                                class="form-control cin preview_name  @error('text') is-invalid @enderror"
                                                tabindex="{{ $tabindex++ }}" value="{{ $card->title }}">
                                            @if ($errors->has('text'))
                                                <span
                                                    class="help-block text-danger">{{ $errors->first('text') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3 d-none form-input" id="logofield">
                                            <label for="logo" class="form-label">Logo</label>
                                            <input type="file" name="logo" id="logo"
                                                onchange="readURL(this);"
                                                class="form-control @error('logo') is-invalid @enderror"
                                                tabindex="{{ $tabindex++ }}">
                                            @if ($errors->has('logo'))
                                                <span
                                                    class="help-block text-danger">{{ $errors->first('logo') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3 form-input">
                                            <label for="selectField2" class="form-label">Gallery or Video <span
                                                    class="text-danger">*</span></label></label>
                                            <select id="selectField2" name="gallery_type" class="form-control"
                                                tabindex="{{ $tabindex++ }}" required>
                                                <option value="gallery"
                                                    @if ($gallery_type == 'gallery') selected @endif>Gallery</option>
                                                <option value="videourl"
                                                    @if ($gallery_type == 'videourl') selected @endif>Video Url
                                                </option>
                                                <option value="videosource"
                                                    @if ($gallery_type == 'videosource') selected @endif>Uplaod Video
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3 form-input {{ $gallery_type == 'gallery' ? 'd-block' : 'd-none' }}"
                                            id="galleryfield">
                                            <label for="gallery" class="form-label">Gallery (Select Multiple
                                                Images)</label>
                                            <input type="file" name="gallery[]" id="gallery"
                                                class="form-control @error('gallery') is-invalid @enderror"
                                                tabindex="{{ $tabindex++ }}" multiple>
                                            @if ($errors->has('gallery'))
                                                <span
                                                    class="help-block text-danger">{{ $errors->first('gallery') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3 form-input {{ $gallery_type == 'videourl' ? 'd-block' : 'd-none' }}"
                                            id="videourl">
                                            <label for="video" class="form-label">Video Url</label>
                                            <input type="url" name="video" placeholder="your video url"
                                                id="video_url"
                                                class="form-control @error('video') is-invalid @enderror"
                                                tabindex="{{ $tabindex++ }}" value="">
                                            @if ($errors->has('video'))
                                                <span
                                                    class="help-block text-danger">{{ $errors->first('video') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3 form-input {{ $gallery_type == 'videosource' ? 'd-block' : 'd-none' }}"
                                            id="videosource">
                                            <label for="video" class="form-label">Uplaod Video</label>
                                            <input type="file" name="video" placeholder="upload your video"
                                                id="video_file"
                                                class="form-control @error('video') is-invalid @enderror"
                                                tabindex="{{ $tabindex++ }}">
                                            @if ($errors->has('video'))
                                                <span
                                                    class="help-block text-danger">{{ $errors->first('video') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 form-input">
                                            <label for="phone_number" class="form-label">Phone <span
                                                    class="text-danger">*</span></label></label>
                                            <input type="number" name="phone_number" data-type="phone_number"
                                                data-preview="preview_phone_number" id="phone"
                                                placeholder="your phone"
                                                class="social_item_in form-control cin @error('phone') is-invalid @enderror"
                                                tabindex="{{ $tabindex++ }}" value="{{ $card->phone_number }}"
                                                required>
                                            @if ($errors->has('phone_number'))
                                                <span
                                                    class="help-block text-danger">{{ $errors->first('phone_number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 form-input">
                                            <label for="email" class="form-label">Email <span
                                                    class="text-danger">*</span></label></label>
                                            <input type="email" name="email" data-type="user_email"
                                                data-type="email" placeholder="your email" id="email"
                                                class="social_item_in form-control cin @error('email') is-invalid @enderror"
                                                data-preview="preview_email" tabindex="{{ $tabindex++ }}"
                                                value="{{ $card->email }}" required>
                                            @if ($errors->has('email'))
                                                <span
                                                    class="help-block text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 form-input">
                                            <label for="website" class="form-label">Website</label>
                                            <input type="url" name="website" data-type="website"
                                                placeholder="your website" id="website"
                                                class="social_item_in form-control cin @error('website') is-invalid @enderror cin"
                                                tabindex="{{ $tabindex++ }}" value="{{ $card->website }}">
                                            @if ($errors->has('website'))
                                                <span
                                                    class="help-block text-danger">{{ $errors->first('website') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 form-input">
                                            <label for="facebook" class="form-label">Facebook</label>
                                            <input type="text" name="facebook" data-type="facebook"
                                                placeholder="facebook username" id="facebook"
                                                class="social_item_in form-control @error('facebook') is-invalid @enderror"
                                                tabindex="{{ $tabindex++ }}"
                                                value="{{ getInputValue($card->id, 'facebook') }}">
                                            @if ($errors->has('facebook'))
                                                <span
                                                    class="help-block text-danger">{{ $errors->first('facebook') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 form-input">
                                            <label for="instagram" class="form-label">Instagram</label>
                                            <input type="text" name="instagram" id="instagram"
                                                data-type="instagram" placeholder="instagram username"
                                                class="social_item_in form-control @error('instagram') is-invalid @enderror"
                                                tabindex="{{ $tabindex++ }}"
                                                value="{{ getInputValue($card->id, 'instagram') }}">
                                            @if ($errors->has('instagram'))
                                                <span
                                                    class="help-block text-danger">{{ $errors->first('instagram') }}</span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="mb-3 form-input">
                                            <label for="cashapp" class="form-label">CashApp</label>
                                            <input type="text" name="cashapp" data-preview="preview_cashapp"
                                                id="cashapp" placeholder="cashapp username"
                                                value="{{ $card->cashapp }}"
                                                class="form-control cin  @error('cashapp') is-invalid @enderror"
                                                tabindex="{{ $tabindex++ }}">
                                            @if ($errors->has('cashapp'))
                                                <span
                                                    class="help-block text-danger">{{ $errors->first('cashapp') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    @if ($plan_details->personalized_link == '1')
                                        <div class="col-6">
                                            <div class="mb-3 form-input">
                                                <label for="personalized_link" class="form-label">Personalized
                                                    Link <span class="text-danger">*</span></label></label>
                                                <input type="text" placeholder="Personalized Link"
                                                    name="personalized_link" id="personalized_link"
                                                    class="form-control @error('gallery_type') is-invalid @enderror"
                                                    value="{{ $card->card_url }}" tabindex="{{ $tabindex++ }}">
                                                @if ($errors->has('personalized_link'))
                                                    <span
                                                        class="help-block text-danger">{{ $errors->first('personalized_link') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-12">
                                        <div class="mb-3 form-input">
                                            <label for="footer_text" class="form-label">Copyright</label>
                                            <input type="text" name="footer_text" placeholder="copyright"
                                                id="footer_text"
                                                class="form-control @error('footer_text') is-invalid @enderror"
                                                tabindex="{{ $tabindex++ }}" value="{{ $card->footer_text }}">
                                            @if ($errors->has('footer_text'))
                                                <span
                                                    class="help-block text-danger">{{ $errors->first('footer_text') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary submitBtn">Update Biz Ad</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('user.includes.footer')
</div>

<!-- Social Modal modal -->
<div class="share_modal email_modal">
    <div class="modal animate__animated animate__fadeIn" id="SocialModal" tabindex="-1" data-bs-backdrop="static"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Share Your Card') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal_body">
                    <div id="social-links">
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <ul class="text-center">
                                    <li class="list-inline-item">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ auth()->user()->user_id }}"
                                            target="_blank" class="social_share"
                                            data-url="https://www.facebook.com/sharer/sharer.php?u={{ auth()->user()->user_id }}"
                                            title="{{ __('Share on Facebook') }}">
                                            <img class="img-fluid"
                                                src="{{ asset('images/icons/social/facebook.svg') }}"
                                                alt="{{ __('Share on facebook') }}">
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="https://twitter.com/intent/tweet?text=Hello%21+This+is+my+vCard.&amp;url={{ auth()->user()->user_id }}"
                                            target="blank" class="social_share"
                                            data-url="https://twitter.com/intent/tweet?text=Hello%21+This+is+my+vCard.&amp;url={{ auth()->user()->user_id }}
                                        "
                                            title="{{ __('Share on Twitter') }}">
                                            <img class="img-fluid"
                                                src="{{ asset('images/icons/social/twitter.svg') }}" alt="">
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript:void(0)" class="social_share"
                                            data-url="https://telegram.me/share/url?url={{ auth()->user()->user_id }}&text="
                                            title="{{ __('Share on Telegram') }}">
                                            <img class="img-fluid"
                                                src="{{ asset('images/icons/social/telegram.svg') }}" alt="">
                                        </a>
                                    </li>

                                    @if ($android !== false || $ipad !== false || $iphone !== false || true)
                                        <li class="list-inline-item">
                                            <a href="whatsapp://send?text={{ auth()->user()->user_id }}"
                                                class="social_share whatsapp" title="{{ __('Share on Whatsapp') }}"
                                                data-action="share/whatsapp/share">
                                                <img class="img-fluid"
                                                    src="{{ asset('images/icons/social/whatsapp.svg') }}"
                                                    alt="">
                                            </a>
                                        </li>
                                    @else
                                        <li class="list-inline-item">
                                            <a href="https://web.whatsapp.com/send?text={{ auth()->user()->user_id }}"
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


@push('custom-js')
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/card.js') }}"></script>

    <script>
        function hexToRgb(hex) {
            const normal = hex.match(/^#([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i);
            if (normal) return normal.slice(1).map(e => parseInt(e, 16));
            const shorthand = hex.match(/^#([0-9a-f])([0-9a-f])([0-9a-f])$/i);
            if (shorthand) return shorthand.slice(1).map(e => 0x11 * parseInt(e, 16));
            return null;
        }
        $(document).on('input', '#theme_color', function(e) {
            var current_color = $("#theme_color").val();
            console.log(current_color);
            // $( "#theme_color_input").val(current_color);
            let hex2rgb = hexToRgb(current_color);
            let rgb = hex2rgb.toString();
            $('.social_item').find('i').css('border-color', current_color);
            $('.subscribe-btn').css({
                'background-color': current_color
            });
            $('.purchase_btn').find('a').css({
                'background-color': 'rgba(' + rgb + ',.1' + ')'
            });
            $('.card_title').css({
                'background-color': current_color
            });
            $('.card_template').css({
                'background-color': 'rgba(' + rgb + ',.1' + ')'
            });
            $('.carousel-control-prev,.carousel-control-next').css({
                'background-color': current_color
            });
        })


        $(document).ready(function() {
            // logo and text field
            $("#selectField1").change(function() {
                var selected = $(this).val();
                if (selected === "logo") {
                    $('#headline').addClass('d-none');
                    $('#logofield').removeClass('d-none');
                } else {
                    $('#headline').removeClass('d-none');
                    $('#logofield').addClass('d-none');
                }
            });
            // gallery and video fiedl  digitalbizSlider  digitalBizEmbad digitaBizSourc
            $("#selectField2").change(function() {
                var selected2 = $(this).val();
                if (selected2 === "videourl") {
                    $('#galleryfield').addClass('d-none');
                    $('#videourl').removeClass('d-none');
                    $('#videosource').addClass('d-none');
                    $('#digitalBizEmbad').addClass('d-block').removeClass('d-none');
                    $('#digitalbizSlider').addClass('d-none').removeClass('d-block');
                    $('#digitaBizSourc').addClass('d-none').removeClass('d-block');
                } else if (selected2 === "videosource") {
                    $('#galleryfield').addClass('d-none');
                    $('#videourl').addClass('d-none');
                    $('#videosource').removeClass('d-none');
                    $('#digitalBizEmbad').addClass('d-none').removeClass('d-block');
                    $('#digitalbizSlider').addClass('d-none').removeClass('d-block');
                    $('#digitaBizSourc').addClass('d-block').removeClass('d-none');
                } else {
                    $('#galleryfield').removeClass('d-none');
                    $('#videourl').addClass('d-none');
                    $('#videosource').addClass('d-none');
                    $('#digitalBizEmbad').addClass('d-none').removeClass('d-block');
                    $('#digitalbizSlider').addClass('d-block').removeClass('d-none');
                    $('#digitaBizSourc').addClass('d-none').removeClass('d-block');
                }
            });
        });

        $(document).on('input', '#personalized_link', function(e) {
            checkLink();
        })

        function checkLink() {
            "use strict";
            var plink = $('#personalized_link').val();
            if (plink.length > 2) {

                $.ajax({
                    url: "{{ route('user.check.link') }}",
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        link: plink
                    },
                }).done(function(res) {
                    if (res.status == 'success') {
                        $('#status').html("<span class='badge mt-2 bg-green'>{{ __('Available') }}</span>");
                    } else {
                        $('#status').html("<span class='badge mt-2 bg-red'>{{ __('Not available') }}</span>");
                    }
                });
            } else {
                $('#status').html("");
            }
        }
        /* Encode string to link */
        function convertToLink(str) {
            "use strict";
            str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ')
            .toLowerCase();
        str = str.replace(/^\s+|\s+$/gm, '');
        str = str.replace(/\s+/g, '-');
        document.getElementById("plink").value = str;
        //return str;
    }
    $('#card-form').validate({
        rules: {
            'adsname': {
                required: true,
                maxlength: 124,
                minlength: 2,
            },
            'headline': {
                required: true,
                maxlength: 124,
                minlength: 0,

            },
            'gallery_type': {
                required: true,
                maxlength: 124,
                minlength: 0,

            },
            'email': {
                required: true,
                maxlength: 124,
                minlength: 2,
            },
            'phone_number': {
                required: true,
                maxlength: 20,
                minlength: 8,
            },
            'personalized_link': {
                required: true,
                maxlength: 255,
                minlength: 4,

            },
            'footer_text': {
                required: false,
                maxlength: 255,
            },
        },
        messages: {},
        errorPlacement: function(error, element) {
            $(element).parents('.form-input').append(error)
        },
        submitHandler: function(form) {
            $('.submitBtn').html(
                '<div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>'
                ).prop('disabled', true)
            form.submit();
        }
    });

    $(document).on('change', '#selectField1', function() {
        var logo = $(this).val();
        if (logo == 'logo') {
            $('#logoDiv').addClass('d-block').removeClass('d-none');
            $('#titleDiv').addClass('d-none').removeClass('d-block');
        } else {
            $('#logoDiv').addClass('d-none').removeClass('d-block');
            $('#titleDiv').addClass('d-block').removeClass('d-none');
        }
    })


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#previewLogo')
                    .attr('src', e.target.result);
                // .width(150)
                // .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).ready(function() {
        $('#gallery').change(function() {
            $(".carousel-inner").html('');
            for (var i = 0; i < $(this)[0].files.length; i++) {
                if (i == 0) {
                    var slider_active = 'active';
                } else {
                    var slider_active = '';
                }
                $(".carousel-inner").append('<div class="carousel-item ' + slider_active +
                    '"><img src="' + window.URL.createObjectURL(this.files[i]) +
                    '" class="d-block w-100"/></div>');
            }
        });
    });

    $('#adsname,#personalized_link').on('keyup keydown paste', function() {
        var str = $(this).val();
        str = str.replace(/^\s+|\s+$/g, ''); // trim
        str = str.toLowerCase();
        var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
        var to = "aaaaaeeeeeiiiiooooouuuunc------";
        for (var i = 0, l = from.length; i < l; i++) {
            str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }
        str = str.replace(/[^a-z0-9 -]/g, '').replace(/\s+/g, '').replace(/-+/g, '');
        $("#personalized_link").val(str);
        return str;
    })
    $('#video_url').on('change', function() {
        var youtube_url = $(this).val();
        var remove_after = youtube_url.split('&')[0];
        var _file = remove_after.split("v=").pop();
        if (_file) {
            file = _file;
        } else {
            file = arr_video_file[i].split("/").pop();
        }
        video_tag = 'https://www.youtube.com/embed/' + file;
        $('#youtube_video_preview').attr('src', video_tag);
    });

    $(function() {
        $('#video_file').on('change', function() {
            if (isVideo($(this).val())) {
                $('#video_preview').attr('src', URL.createObjectURL(this.files[0]));
                $('.video-prev').show();
            } else {
                $('#video_file').val('');
                $('.video-prev').hide();
                alert("Only video files are allowed to upload.")
            }
        });
    });

    // If user tries to upload videos other than these extension , it will throw error.
    function isVideo(filename) {
        var ext = getExtension(filename);
        switch (ext.toLowerCase()) {
            case 'm4v':
            case 'avi':
            case 'mp4':
            case 'mov':
            case 'mpg':
            case 'mpeg':
                // etc
                return true;
        }
        return false;
    }

    function getExtension(filename) {
        var parts = filename.split('.');
        return parts[parts.length - 1];
    }

    $('#gallery').change(function() {
        $(".carousel-inner").html('');
        for (var i = 0; i < $(this)[0].files.length; i++) {
            if (i == 0) {
                var slider_active = 'active';
            } else {
                var slider_active = '';
            }
            $(".carousel-inner").append('<div class="carousel-item ' + slider_active + '"><img src="' + window
                .URL.createObjectURL(this.files[i]) + '" class="d-block w-100"/></div>');
        }
    });

    $(document).on('input', '.social_item_in', function() {
        var this_value = $(this).val();
        var this_type = $(this).attr('data-type');
        $("a.social-contact").each(function() {
            var href = $(this).attr("href");
            if (href == '' || !href) {
                $(this).addClass('disabled');
                $('.' + this_type).removeClass('disabled');
                $('.' + this_type).attr("href", this_value);

            } else {
                $('.' + this_type).removeClass('disabled');
                $('.' + this_type).attr("href", this_value);
            };
        });

    })

    $(function() {
        var
            max_file_number = <?php echo $plan_details->no_of_galleries; ?>,
            $form = $('form'),
            $file_upload = $('#gallery', $form),
            $button = $('.submit', $form);
        // Disable submit button on page ready.
        // $button.prop('disabled', 'disabled');
        $file_upload.on('change', function() {
            var number_of_images = $(this)[0].files.length;
            if (number_of_images > max_file_number) {
                alert(`You can upload maximum ${max_file_number} files.`);
                    $(this).val('');
                    $button.prop('disabled', 'disabled');
                } else {
                    $button.prop('disabled', false);
                }
            });
        });
    </script>
@endpush
@endsection
