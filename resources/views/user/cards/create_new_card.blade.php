@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])
@section('card-create', 'active')
@section('title')
    Create New DigitalBizAds Card
@endsection
@section('content')
    @push('css')
        <link href="{{ asset('assets/css/image-uploader.min.css') }}" rel="stylesheet">
        {{--
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slim.min.css') }}" /> --}}
        <link href="{{ asset('css/croppie.css') }}" rel="stylesheet" />
        <style>
            span.error {
                color: #E53935;
                padding: 2px 0px;
            }

            a.social-contact.disabled {
                opacity: .3;
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

            .gallery-btn {
                position: absolute;
                top: 13px;
                right: 52px;
                font-size: 20px;
            }

            .loading-spinner {
                display: none;
            }

            .loading-spinner.active {
                display: inline-block;
            }

            button.delete-image.btn-danger.photo-delete {
                position: absolute;
                top: 4px;
                right: 4px;
            }

            a.overlay-btn {
                position: absolute;
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
                width: 100%;
                height: 100%;
                cursor: pointer;
                z-index: 999;
            }

            .login_btn {
                position: absolute;
                top: 6px;
                right: 0;
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
                background: #212121;
                -webkit-transition: all 0.4s ease;
                box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
            }

            .purchase_btn.save_contact {
                text-align: center;
                margin-bottom: 33px;
                margin-top: -19px;
                z-index: 5;
                position: relative;
            }

            .purchase_btn a:hover {
                background: #ffffff !important;
                color: #000000;
            }

            @media screen and (max-width:380px) {
                .save_contact a {
                    padding: 12px 3px;
                    font-size: 11px;
                    width: 44%;
                }
            }
        </style>
    @endpush
    <?php
    $tabindex = 1;
    $android = stripos($_SERVER['HTTP_USER_AGENT'], 'android');
    $iphone = stripos($_SERVER['HTTP_USER_AGENT'], 'iphone');
    $ipad = stripos($_SERVER['HTTP_USER_AGENT'], 'ipad');
    $font_family = ['Arial ', 'Verdana', 'Poppins', 'Tahoma', 'Trebuchet M', 'Times New Roman', 'Georgia', 'Courier New', 'Brush Script', 'Garamond'];

    ?>
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
                            {{ __('Create New DigitalBizAds Card') }}
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
                                <div class="card_template">
                                    <!-- title -->
                                    <div class="card_title p-2" id="titleDiv">
                                        <h2 class="">
                                            <span class="shop-title" id="preview_name">Express T-Shirts</span>
                                            <a class="gallery-btn" data-bs-toggle="modal" data-bs-target="#galleryModal"
                                                href="javascript:void(0)">
                                                <i class="fas fa-images"></i>
                                            </a>
                                            <a class="float-end login_btn" href="javascript:void(0)">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                                    viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1"
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
                                    <div class="card_title p-2 pt-3 d-none" id="logoDiv">
                                        <h2 class="">
                                            <div>
                                                <img id="previewLogo" src="{{ asset('assets/images/bizads.png') }}"
                                                    alt="logo" width="140">
                                            </div>
                                            <a class="gallery-btn" data-bs-toggle="modal" data-bs-target="#galleryModal"
                                                href="javascript:void(0)">
                                                <i class="fas fa-images"></i>
                                            </a>

                                            <a class="float-end login_btn" data-bs-toggle="modal"
                                                data-bs-target="#loginModal" href="javascript:void(0)">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                                    viewBox="0 0 24 24" fill="none" stroke="#ffff" stroke-width="1"
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
                                    <!-- slider -->
                                    <div class="carousel_slider" id="digitalbizSlider">
                                        <img class="d-block w-100" src="{{ asset('backend/img') }}/3.jpg" alt="image">
                                    </div>
                                    <!-- Video -->
                                    <div class="video_wrapper d-none" id="digitaBizSourc">
                                        <div class="ratio ratio-1x1">
                                            <video id="video_preview" data-wf-ignore="true" data-object-fit="cover"
                                                autoplay="" loop="" muted="" playsinline="" controls>
                                                <source src="{{ asset('assets/video.mp4') }}" type="video/mp4">
                                                <source src="{{ asset('assets/video.mp4') }}" type="video/ogg">
                                            </video>
                                        </div>
                                    </div>

                                    <div class="video_wrapper d-none" id="digitalBizEmbad">
                                        <div class="ratio ratio-1x1">
                                            <iframe id="youtube_video_preview"
                                                src="https://www.youtube.com/embed/Fhskvloj1gE"
                                                title="YouTube video player" width="100%" height="315"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>

                                    <!-- purchase button -->
                                    <div class="purchase_btn save_contact">
                                        <a class="text-decoration-none save-contact d-inline-block"
                                            href="javascript:void(0)">Save Contact
                                        </a>
                                        <a class="text-decoration-none d-inline-block btn-secondary"
                                            href="javascript:void(0)">
                                            SHOP
                                        </a>
                                    </div>

                                    <!-- social medai -->
                                    <div class="social_wrapper mb-3">
                                        <div class="section_heading text-center mb-3">
                                            <h4>Connect With Me</h4>
                                        </div>

                                        <div class="social_wrapper">
                                            <div class="row row-cols-4 row-cols-sm-5 g-3">
                                                <!-- social icon -->
                                                <div class="col">
                                                    <div class="social_item">
                                                        <a class="social-contact phone_number" href=""
                                                            target="_blank">
                                                            <i class="fa fa-phone"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- social icon -->
                                                <div class="col">
                                                    <div class="social_item">
                                                        <a class="social-contact user_email" href=""
                                                            target="_blank">
                                                            <i class="fa fa-envelope"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- social icon -->
                                                <div class="col">
                                                    <div class="social_item">
                                                        <a class="social-contact website" href="" target="_blank">
                                                            <i class="fa fa-globe"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- Qr code icon -->
                                                <div class="col">
                                                    <div class="social_item qrcode_icon">
                                                        <a href="javascript:void(0)">
                                                            <img src="{{ asset('backend/img') }}/icon/qr-code.svg"
                                                                alt="qr-code">
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- social icon -->
                                                <div class="col">
                                                    <div class="social_item">
                                                        <a class="social-contact facebook" href=""
                                                            target="_blank">
                                                            <i class="fab fa-facebook"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- social icon -->
                                                <div class="col">
                                                    <div class="social_item">
                                                        <a class="social-contact instagram" href=""
                                                            target="_blank">
                                                            <i class="fab fa-instagram"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="social_item">
                                                        <a class="social-contact about" href="" target="_blank">
                                                            <i class="fas fa-user"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="social_item">
                                                        <a class="social-contact map" href="" target="_blank">
                                                            <i class="fas fa-map-marker"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- subscribe -->
                                    <div class="subscribe mb-3">
                                        <form action="javascript:void(0)" method="">
                                            <div class="input-group">
                                                <input class="form-control" id="email" name="email" type="text"
                                                    placeholder="Enter your emaill..." required="">
                                                <button class="input-group-text btn btn-primary subscribe-btn"
                                                    type="submit">Subscribe</button>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- copyright -->
                                    <div class="bottom_content text-center pb-3">
                                        <p>CashApp: <span id="preview_cashapp">$SBOWEN2005</span> </p>
                                    </div>
                                    <div class="text-center text-light pb-3">
                                        <div class="text-center text-light pb-3">
                                            @if (isFreePlan(Auth::user()->id))
                                                <p>All Rights Reserved by Digitalbizads.com</p>
                                            @else
                                                <p id="preview_copyright">© Copyright</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-xl-7">
                        <div class="card card_form">
                            <div class="card-body">
                                <form id="card-form" action="{{ route('user.card.store') }}" method="post"
                                    novalidate="novalidate" enctype="multipart/form-data">
                                    @csrf
                                    <input id="upload_image_url" name="upload_image_url" type="hidden"
                                        value="{{ route('user.card.upload_image') }}" />
                                    <input id="upload_logo_url" name="upload_logo_url" type="hidden"
                                        value="{{ route('user.card.upload_logo') }}" />

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3 form-input">
                                                <label class="form-label" for="adsname">Biz Ads Name <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control @error('adsname') is-invalid @enderror"
                                                    id="adsname" name="adsname" type="text"
                                                    value="{{ old('adsname') }}" tabindex="{{ $tabindex++ }}"
                                                    placeholder="ads name">
                                                @if ($errors->has('adsname'))
                                                    <span
                                                        class="help-block text-danger">{{ $errors->first('adsname') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-input">
                                                <label class="form-label" for="email">Email <span
                                                        class="text-danger">*</span></label></label>
                                                <input
                                                    class="social_item_in form-control cin @error('email') is-invalid @enderror"
                                                    id="email" name="email" data-attr="mailto:"
                                                    data-type="user_email" data-type="email" data-preview="preview_email"
                                                    type="email" value="{{ old('email') ?? Auth::user()->email }}"
                                                    tabindex="{{ $tabindex++ }}" placeholder="your email" required>
                                                @if ($errors->has('email'))
                                                    <span
                                                        class="help-block text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3 form-input">
                                                <label class="form-label" for="phone_number">Phone <span
                                                        class="text-danger">*</span></label></label>
                                                <input
                                                    class="social_item_in form-control cin @error('phone') is-invalid @enderror"
                                                    id="phone" name="phone_number" data-attr="tel:"
                                                    data-type="phone_number" data-preview="preview_phone_number"
                                                    type="text" value="{{ old('phone_number') }}"
                                                    tabindex="{{ $tabindex++ }}" placeholder="your phone" required>
                                                @if ($errors->has('phone_number'))
                                                    <span
                                                        class="help-block text-danger">{{ $errors->first('phone_number') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3 form-input">
                                                <label class="form-label" for="whatsapp">Whatsapp <span
                                                        class="text-danger">*</span></label></label>

                                                <input type="text" name="whatsapp" id="whatsapp" class="form-control" placeholder="Whatsapp" required>
                                                @if ($errors->has('whatsapp'))
                                                    <span
                                                        class="help-block text-danger">{{ $errors->first('whatsapp') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="mb-3 form-input">
                                            <label class="form-label" for="">Logo Type(Biz Name) <span
                                                    class="text-danger">*</span></label></label>
                                            <div class="input-group">
                                                <div class="input-group-text p-0">
                                                    <select class="form-control border-0 pe-3 ps-3" id="selectField1" name="headline"
                                                tabindex="{{ $tabindex++ }}" required style="height: 43px !important;">
                                                        <option value="text">Text</option>
                                                        <option value="logo">Logo</option>
                                                    </select>
                                                </div>

                                                {{-- text field --}}
                                                <input id="headline" class="form-control cin preview_name @error('text') is-invalid @enderror"
                                                id="text" name="text" data-preview="preview_name"
                                                data-concat="preview_name" type="text"
                                                value="{{ old('text') }}" tabindex="{{ $tabindex++ }}"
                                                placeholder="Biz Ad Name">
                                                <div class="input-group-text p-0" id="headline2">
                                                    <select class="form-control border-0" id="header_font_family"
                                                    name="header_font_family" style="height: 43px !important;">
                                                        @foreach ($font_family as $font_)
                                                            <option value="{{ $font_ }}">{{ $font_ }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if ($errors->has('text'))
                                                    <span
                                                        class="help-block text-danger">{{ $errors->first('text') }}</span>
                                                @endif

                                                {{-- logo field --}}
                                                <input id="logofield" class="form-control d-none @error('logo') is-invalid @enderror"
                                                        name="logo" type="file"
                                                        tabindex="{{ $tabindex++ }}" onchange="readURL(this);">
                                                    @if ($errors->has('logo'))
                                                        <span
                                                            class="help-block text-danger">{{ $errors->first('logo') }}</span>
                                                    @endif
                                                    </div>
                                            </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="mb-3 form-group">
                                            <label class="form-label" for="selectField2">Banner <span
                                                class="text-danger">*</span></label></label>
                                            <div class="input-group">

                                                <div class="input-group-text p-0">
                                                    <select class="form-control border-0 " id="selectField2" name="gallery_type"
                                                        tabindex="{{ $tabindex++ }}" required style="height: 43px !important;">
                                                        {{-- <option value="gallery">Gallery</option> --}}
                                                        <option value="banner">Photo</option>
                                                        <option value="videourl">Video Url</option>
                                                        <option value="videosource">Uplaod Video</option>
                                                    </select>
                                                </div>

                                                {{-- banner --}}
                                                <input id="galleryfield" class="form-control @error('banner') is-invalid @enderror"
                                                      name="banner" type="file"
                                                    tabindex="{{ $tabindex++ }}" required>
                                                @if ($errors->has('banner'))
                                                    <span
                                                        class="help-block text-danger">{{ $errors->first('banner') }}</span>
                                                @endif

                                                {{-- video url --}}
                                                <input id="videourl" class="form-control d-none @error('video') is-invalid @enderror"
                                                      name="video" type="url"
                                                    value="{{ old('video') }}" tabindex="{{ $tabindex++ }}"
                                                    placeholder="your video url">
                                                @if ($errors->has('video'))
                                                    <span class="help-block text-danger">{{ $errors->first('video') }}</span>
                                                @endif

                                                {{-- video source --}}
                                                <input id="videosource" class="form-control d-none @error('video') is-invalid @enderror"
                                                     name="video" type="file"
                                                    tabindex="{{ $tabindex++ }}" placeholder="upload your video">
                                                @if ($errors->has('video'))
                                                    <span
                                                        class="help-block text-danger">{{ $errors->first('video') }}</span>
                                                @endif


                                            </div>
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="input-field">
                                                    <label class="active">Gallery<span class="img-note d-inline-block">
                                                            {{-- <i class="la la-bell"
                                                            aria-hidden="true"></i>{{trans('form.image_size')}} 800 x
                                                        800 pixels</span> --}}
                                                    </label>
                                                    <div class="prod_def_photo_upload" title="Click for photo upload"
                                                        style="padding-top: .5rem;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3 form-input">
                                                <label class="form-label" for="website">Website</label>
                                                <input
                                                    class="social_item_in form-control cin  @error('website') is-invalid @enderror"
                                                    id="website" id="company_websitelink" name="website"
                                                    data-attr="" data-type="website"
                                                    data-preview="preview_company_websitelink" type="url"
                                                    value="{{ old('website') }}" tabindex="{{ $tabindex++ }}"
                                                    placeholder="your website">
                                                @if ($errors->has('website'))
                                                    <span
                                                        class="help-block text-danger">{{ $errors->first('website') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-input">
                                                <label class="form-label" for="facebook">Facebook
                                                    <button class="tooltip_icon" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                                        data-bs-title="The profile link look like https://www.facebook.com/user-id"
                                                        type="button">
                                                        <i class="fa fa-info"></i>
                                                    </button>
                                                </label>
                                                <input
                                                    class="social_item_in form-control @error('facebook') is-invalid @enderror"
                                                    id="facebook" name="facebook" data-attr="" data-type="facebook"
                                                    type="url" value="{{ old('facebook') }}"
                                                    tabindex="{{ $tabindex++ }}" placeholder="facebook profile link">
                                                @if ($errors->has('facebook'))
                                                    <span
                                                        class="help-block text-danger">{{ $errors->first('facebook') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-input">
                                                <label class="form-label" for="instagram">Instagram <button
                                                        class="tooltip_icon" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                                        data-bs-title="The profile link look like https://www.instagram.com/user-id"
                                                        type="button">
                                                        <i class="fa fa-info"></i>
                                                    </button></label>
                                                <input
                                                    class="social_item_in form-control @error('instagram') is-invalid @enderror"
                                                    id="instagram" name="instagram" data-attr="" data-type="instagram"
                                                    type="url" value="{{ old('instagram') }}"
                                                    tabindex="{{ $tabindex++ }}" placeholder="instagram profile link">
                                                @if ($errors->has('instagram'))
                                                    <span
                                                        class="help-block text-danger">{{ $errors->first('instagram') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-input">
                                                <label class="form-label" for="cashapp">CashApp</label>
                                                <input class="form-control cin @error('cashapp') is-invalid @enderror"
                                                    id="cashapp" name="cashapp" data-preview="preview_cashapp"
                                                    type="text" value="{{ old('cashapp') }}"
                                                    tabindex="{{ $tabindex++ }}" placeholder="cashapp username">
                                                @if ($errors->has('cashapp'))
                                                    <span
                                                        class="help-block text-danger">{{ $errors->first('cashapp') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3 form-input">
                                            <label class="form-label" for="location">Location google link</label>
                                            <input
                                                class="social_item_in form-control cin @error('location') is-invalid @enderror"
                                                id="location" name="location" data-preview="preview_location"
                                                data-attr="" data-type="map" type="url"
                                                value="{{ old('location') }}" tabindex="{{ $tabindex++ }}"
                                                placeholder="location">
                                            @if ($errors->has('location'))
                                                <span
                                                    class="help-block text-danger">{{ $errors->first('location') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3 form-input">
                                            <label class="form-label" for="about_us">About Your Bussiness</label>
                                            <textarea class="social_item_in form-control cin @error('about_us') is-invalid @enderror" id="about_us"
                                                name="about_us" data-type="about" data-preview="preview_about_us" data-attr="" type="text"
                                                tabindex="{{ $tabindex++ }}" placeholder="About Your Bussiness" cols="30" rows="10">{{ old('about_us') }}</textarea>
                                            @if ($errors->has('about_us'))
                                                <span
                                                    class="help-block text-danger">{{ $errors->first('about_us') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label" for="about_us">Card Link</label>
                                        <div class="mb-3 input-group">
                                            <span class="input-group-text">Base link</span>
                                            <input type="text" name="base_link" id="base_link" class="form-control" placeholder="" required>
                                        </div>
                                        @if ($errors->has('base_link'))
                                                <span class="help-block text-danger">{{ $errors->first('base_link') }}</span>
                                        @endif
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-3 form-input position-relative">
                                            <label class="form-label" for="footer_text">Copyright</label>
                                            @if (isFreePlan(Auth::user()->id))
                                                <a class="overlay-btn upgrade-plan" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                                    href="javascript:void(0)"
                                                    title="Upgrade to a Premium account to access custom Copyright"></a>
                                            @endif
                                            <input class="form-control cin @error('footer_text') is-invalid @enderror"
                                                id="footer_text" name="footer_text" data-preview="preview_copyright"
                                                type="text" tabindex="{{ $tabindex++ }}"
                                                placeholder="copyright"
                                                {{ isFreePlan(Auth::user()->id) == true ? 'disabled' : '' }}>
                                            @if ($errors->has('footer_text'))
                                                <span
                                                    class="help-block text-danger">{{ $errors->first('footer_text') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3 form-input">
                                                <label class="form-label" for="header_backgroung">Header B/G
                                                    Color</label>
                                                <div class="input-group custome_color">
                                                    <label class="input-group-text" for="header_backgroung">
                                                        <img src="{{ asset('images/color-picker.png') }}"
                                                            alt="color picker" width="25">
                                                        <input
                                                            class="form-control @error('header_backgroung') is-invalid @enderror"
                                                            id="header_backgroung" name="header_backgroung"
                                                            type="color"
                                                            value="{{ old('header_backgroung') ?? ' #ffc107' }}"
                                                            tabindex="{{ $tabindex++ }}" placeholder="card color"
                                                            required>
                                                    </label>
                                                    <input class="form-control" id="theme_back_code" type="text"
                                                        value="#ffc107" disabled>
                                                </div>
                                                @if ($errors->has('header_backgroung'))
                                                    <span
                                                        class="help-block text-danger">{{ $errors->first('header_backgroung') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3 form-input" id="textfield">
                                                <label class="form-label" for="header_text_color">Header Text
                                                    Color</label>
                                                <div class="input-group custome_color">
                                                    <label class="input-group-text" for="header_text_color">
                                                        <img src="{{ asset('images/color-picker.png') }}"
                                                            alt="color picker" width="25">
                                                        <input
                                                            class="form-control @error('header_text_color') is-invalid @enderror"
                                                            id="header_text_color" name="header_text_color"
                                                            type="color"
                                                            value="{{ old('header_text_color') ?? '#ffffff' }}"
                                                            tabindex="{{ $tabindex++ }}" placeholder="card color"
                                                            required>
                                                    </label>
                                                    <input class="form-control" id="header_clr_code" type="text"
                                                        value="#ffffff">
                                                </div>
                                                @if ($errors->has('header_text_color'))
                                                    <span
                                                        class="help-block text-danger">{{ $errors->first('header_text_color') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mb-3 form-input" id="textfield">
                                                <label class="form-label">Biz Ad B/G Color</label>
                                                <div class="input-group custome_color">
                                                    <label class="input-group-text" for="theme_color">
                                                        <img src="{{ asset('images/color-picker.png') }}"
                                                            alt="color picker" width="25">
                                                        <input
                                                            class="form-control @error('theme_color') is-invalid @enderror"
                                                            id="theme_color" name="theme_color" type="color"
                                                            value="{{ old('theme_color') ?? '#ffc107' }}"
                                                            tabindex="{{ $tabindex++ }}" placeholder="card color"
                                                            required>
                                                    </label>
                                                    <input class="form-control" id="theme_clr_code" type="text"
                                                        value="#ffc107" disabled>
                                                </div>
                                                @if ($errors->has('theme_color'))
                                                    <span
                                                        class="help-block text-danger">{{ $errors->first('theme_color') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3 form-input">
                                                <label class="form-label" for="icon_border_color">Icon Border
                                                    Color</label>
                                                <div class="input-group custome_color">
                                                    <label class="input-group-text" for="icon_border_color">
                                                        <img src="{{ asset('images/color-picker.png') }}"
                                                            alt="color picker" width="25">
                                                        <input
                                                            class="form-control @error('icon_border_color') is-invalid @enderror"
                                                            id="icon_border_color" name="icon_border_color"
                                                            type="color"
                                                            value="{{ old('icon_border_color') ?? ' #ffc107' }}"
                                                            tabindex="{{ $tabindex++ }}" placeholder="card color"
                                                            required>
                                                    </label>
                                                    <input class="form-control" id="icon_border_color_code"
                                                        type="text" value="#ffc107" disabled>
                                                </div>
                                                @if ($errors->has('icon_border_color'))
                                                    <span
                                                        class="help-block text-danger">{{ $errors->first('icon_border_color') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>

                                    <div class="mb-3">
                                        <button class="btn btn-primary submit submitBtn" type="submit">Create Your Biz
                                            Ad</button>
                                    </div>

                                    {{-- <div class="row">
                                        <div class="col-12">
                                        <div class="mb-3 form-input">
                                            <label for="footer_text" class="form-label">Copyright</label>
                                            <input type="text" name="footer_text" placeholder="copyright"
                                                id="footer_text" data-preview="preview_copyright"
                                                value="{{ old('footer_text') }}"
                                                class="form-control cin @error('footer_text') is-invalid @enderror"
                                                tabindex="{{ $tabindex++ }}">
                                            @if ($errors->has('footer_text'))
                                            <span class="help-block text-danger">{{ $errors->first('footer_text')
                                                }}</span>
                                            @endif
                                        </div>
                                    </div>
                                        @if ($plan_details->personalized_link == '1')
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label
                                                        class="form-label required">{{ __('Personalized Link') }}</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"> {{ URL::to('/') }} </span>
                                                        <input class="form-control" id="personalized_link"
                                                            name="personalized_link" type="text"
                                                            value="{{ old('personalized_link') }}"
                                                            placeholder="{{ __('Personalized Link') }}"
                                                            autocomplete="off" minlength="3" />
                                                    </div>
                                                    @if ($errors->has('personalized_link'))
                                                        <span
                                                            class="help-block text-danger">{{ $errors->first('personalized_link') }}</span>
                                                    @endif
                                                    <p id="status"></p>
                                                </div>
                                            </div>
                                        @endif
                                    </div> --}}

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
        <div class="modal animate__animated animate__fadeIn" id="SocialModal" data-bs-backdrop="static"
            aria-labelledby="exampleModalLabel" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Share Your Card') }}</h5>
                        <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                    </div>
                    <div class="modal_body">
                        <div id="social-links">
                            <div>
                                <label class="py-2" for="send_to">Send To</label>
                                <div class="input-group">
                                    <input class="form-control @error('send_to') is-invalid @enderror" id="send_to"
                                        name="send_to" type="text" placeholder="Send to phone no" required>
                                    <a class="input-group-text btn btn-dark sendto-btn" href="javascript:void(0)">Send</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('user.cards._upgrade_plan_modal')
@endsection

@push('script')
    {{-- <script type="text/javascript" src="{{ asset('assets/js/slim.kickstart.min.js') }}"></script> --}}
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/card.js') }}"></script>
    <script src="{{ asset('assets/js/image-uploader.min.js') }}"></script>
    {{-- <script src="{{ asset('js/croppie.js') }}"></script> --}}
    {{-- @include('image_crop') --}}

    <script>
        $(document).on('click', '.upgrade-plan', function(e) {
            e.preventDefault();
            $('#planModal').modal('show');
        })
        $(function() {
            // show color code
            $('#theme_color').on('input', function() {
                $('#theme_clr_code').val(this.value);
            });
            $('#header_backgroung').on('input', function() {
                $('#theme_back_code').val(this.value);
            });
            $('#header_text_color').on('input', function() {
                $('#header_clr_code').val(this.value);
            });
            $('.prod_def_photo_upload').imageUploader();
        });

        function hexToRgb(hex) {
            const normal = hex.match(/^#([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i);
            if (normal) return normal.slice(1).map(e => parseInt(e, 16));
            const shorthand = hex.match(/^#([0-9a-f])([0-9a-f])([0-9a-f])$/i);
            if (shorthand) return shorthand.slice(1).map(e => 0x11 * parseInt(e, 16));
            return null;
        }
        $(document).on('input', '#theme_color', function(e) {
            console.log("test");
            var current_color = $("#theme_color").val();
            console.log(current_color);
            let hex2rgb = hexToRgb(current_color);
            let rgb = hex2rgb.toString();
            $('.social_item').find('i').css('border-color', current_color);
            $('.social-contact').find('i').css('background-color', 'rgba(' + rgb + ',.5' + ')');
            $('.subscribe-btn').css({
                'background-color': current_color
            });
            $('.purchase_btn').find('a').css({
                'background-color': current_color
            });
            $('.card_template').css({
                'background-color': 'rgba(' + rgb + ',.5' + ')'
            });
            $('.carousel-control-prev,.carousel-control-next').css({
                'background-color': current_color
            });
        })

        $(document).on('input', '#header_backgroung', function(e) {
            var current_color = $("#header_backgroung").val();
            $('.card_title').css({
                'background-color': current_color
            });
        })

        $(document).on('input', '#icon_border_color', function(e) {
            $('#icon_border_color_code').val(this.value);
            var current_color = $("#icon_border_color").val();
            $('.social_item').find('i').css('border-color', current_color);
        })

        $(document).on('change', '#header_font_family', function(e) {
            var font = $("#header_font_family").val();
            $('.shop-title').css('font-family', font);
        })


        // $(document).on('input', '#header_text_color', function(e) {
        //     var current_color = $("#header_text_color").val();
        //     $('#preview_name').css({
        //         'color': current_color
        //     });
        // })

        $(document).on('input', '#header_text_color', function(e) {
            var current_color = $("#header_text_color").val();
            $('.gallery-btn').find('i').css('color', current_color);
            $('.social-contact').find('i').css('color', current_color);
            $('.login_btn').find('svg').attr('stroke', current_color);
            $('#preview_name').css({
                'color': current_color
            });
        })


        $(document).ready(function() {
            // logo and text field
            $("#selectField1").change(function() {
                var selected = $(this).val();
                if (selected === "logo") {
                    $('#headline').addClass('d-none');
                    $('#headline2').addClass('d-none');
                    $('#logofield').removeClass('d-none');
                } else {
                    $('#headline').removeClass('d-none');
                    $('#headline2').removeClass('d-none');
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
                        $('#status').html(
                            "<span class='text-success'>{{ __('Personalized link is available') }}</span>");
                    } else {
                        $('#status').html(
                            "<span class='text-danger'>{{ __('Personalized link is not available') }}</span>");
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
                '<div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>&emsp;<span>Processing...</span>'
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
                $('#previewLogo').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).ready(function() {
        $('#banner').change(function() {
            $('#digitalbizSlider').html('');
            $("#digitalbizSlider").append('<img src="' + window.URL.createObjectURL(this.files[0]) +
                '" class="d-block w-100"/>');

        });
    });

    $('#personalized_link').on('input', function() {
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
        var data_attr = $(this).attr('data-attr');
        console.log(data_attr);
        $("a.social-contact").each(function() {
            var href = $(this).attr("href");
            if (href == '' || !href) {
                $(this).addClass('disabled');
                $('.' + this_type).removeClass('disabled');

                $('.' + this_type).attr("href", data_attr + this_value);

            } else {
                $('.' + this_type).removeClass('disabled');
                $('.' + this_type).attr("href", data_attr + this_value);
            };
        });

    });



    $(document).on('input', '#personalized_link', function(e) {

        checkLink();
    })

    $(function() {
        var max_file_number = `{{ $plan_details->no_of_galleries }}`,
            $form = $('form'),
            $file_upload = $('#gallery', $form),
            $button = $('.submit', $form);
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
