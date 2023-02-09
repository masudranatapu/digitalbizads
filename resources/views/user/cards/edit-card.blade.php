@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])
@section('css')
<link href="{{ asset('assets/css/image-uploader.min.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slim.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/croppie.css') }}" />
<style>
    .loading-spinner {
    display: none;
}
.loading-spinner.active {
    display: inline-block;
}
img#previewLogo {
    max-width: 140px;
}
button.delete-image.btn-danger.photo-delete {
    position: absolute;
    top: 4px;
    right: 4px;
}
</style>
@endsection
@section('content')
<?php
    $tabindex = 1;
    $android = stripos($_SERVER['HTTP_USER_AGENT'], 'android');
    $iphone = stripos($_SERVER['HTTP_USER_AGENT'], 'iphone');
    $ipad = stripos($_SERVER['HTTP_USER_AGENT'], 'ipad');
    if (!empty($card->banner_content)) {
        if ($card->banner_type == 'banner') {
            $banner_type = 'banner';
        } elseif ($card->banner_type == 'videourl') {
            $banner_type = 'videourl';
        } elseif ($card->banner_type == 'videosource') {
            $banner_type = 'videosource';
        }
    } else {
        $banner_type = 'banner';
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

    ?>

<link href="{{ asset('assets/css/image-uploader.min.css')}}" rel="stylesheet">

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
        background-color: {{$theme_color}};
    }

    .gallery-btn {
        position: absolute;
        top: 23px;
        right: 52px;
        font-size: 20px;
        /* color: #0d6efd !important; */
    }

    a.social-contact.disabled {
        opacity: .3;
    }

    .social_item i {
        border-color: {{$theme_color}}!important;
    }

    .carousel-control-prev,
    .carousel-control-next {
        background-color: {{$theme_color.'!important'}};
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

    .delete-image.photo-delete {
        position: absolute;
        top: 0;
        right: 0;
        width: 22px;
        height: 22px;
        border-radius: 50px;
        border: none !important;
    }

    .gallery_image img {
        width: 100%;
        height: 111px;
        margin-bottom: 12px;
    }
    .gallery-btn {
        position: absolute;
        top: 23px;
        right: 52px;
        font-size: 20px;
    }
</style>

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

                                <div class="card_title p-2 pt-3 d-block" style="background-color: {{ $card->header_backgroung ?? '#000000' }};">
                                    <h2>
                                        @if (!empty($card->logo))
                                        <div class="text-center" id="logoDiv">
                                            <img src="{{ asset($card->logo) }}" id="previewLogo" alt="logo">
                                        </div>
                                        @elseif ($card->title)
                                        <div id="titleDiv">
                                            <span id="preview_name"
                                            style="color:{{ $card->header_text_color ?? '#ffffff' }}; ">{{ $card->title }}</span>
                                        </div>
                                        @else
                                        <div class="d-block text-center" id="logoDiv">
                                            <img src="{{ asset('assets/images/bizads.png') }}" width="140" alt="logo">
                                        </div>
                                        <div class="d-none" id="titleDiv">
                                            <span id="preview_name"
                                            style="color:{{ $card->header_text_color ?? '#ffffff' }}; ">
                                            <span>Express T-Shirts</span>
                                        </span>
                                        </div>

                                        @endif
                                        <a href="javascript:void(0)" class="gallery-btn" data-bs-toggle="modal"
                                        data-bs-target="#galleryModal">
                                        <i class="fas fa-images" style="color:{{ $card->header_text_color }};"></i>
                                    </a>

                                        <a href="javascript:void(0)" class="float-end login_btn" data-bs-toggle="modal"
                                            data-bs-target="#loginModal">
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

                                <div class="slider-box" id="slider-box">

                                    @if (!empty($card->banner_content))
                                    @if ($card->banner_type == 'videourl')
                                    <div class="video_wrapper" id="digitalBizEmbad">
                                        <div class="ratio ratio-1x1">
                                            <iframe width="100%" src="{{ $card->banner_content }}" frameborder="0"
                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    @elseif ($card->banner_type == 'videosource')
                                    <!-- Video -->
                                    <div class="video_wrapper" id="digitaBizSourc">
                                        <div class="ratio ratio-1x1">
                                            <video autoplay="" loop="" muted="" playsinline="" data-wf-ignore="true"
                                                data-object-fit="cover" controls>
                                                <source src="{{ $card->banner_content }}" type="video/mp4">
                                                <source src="{{ $card->banner_content }}" type="video/ogg">
                                            </video>
                                        </div>
                                    </div>
                                    @elseif ($card->banner_type == 'banner')

                                    <div class="" id="digitalbizSlider">
                                        <img src="{{ asset($card->banner_content) }}" class="d-block w-100" alt="image">
                                    </div>
                                    @endif
                                    @else
                                    <div id="digitalbizSlider">
                                        <img src="{{ asset('backend/img') }}/1.jpg" class="d-block w-100" alt="image">
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
                                            <video autoplay="" loop="" muted="" playsinline="" id="video_preview"
                                                data-wf-ignore="true" data-object-fit="cover" controls>
                                                <source src="{{ asset('assets/video.mp4') }}" type="video/mp4">
                                                <source src="{{ asset('assets/video.mp4') }}" type="video/ogg">
                                            </video>
                                        </div>
                                    </div>
                                    <div class="d-none" id="digitalbizSlider">
                                        <img src="{{ asset('backend/img') }}/1.jpg" class="d-block w-100" alt="image">
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
                                                    <a href="javascript:void(0)" target="_blank" data-bs-toggle="modal"
                                                        data-bs-target="#qrcodeModal">
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
                                    <form action="javascript:void(0)" method="">
                                        <div class="input-group">
                                            <input type="text" name="email" id="email" class="form-control"
                                                placeholder="Enter your emaill..." required="">
                                            <button type="submit" class="input-group-text btn btn-primary subscribe-btn"
                                                style="background-color: {{ $theme_color }}">Subscribe</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- copyright -->
                                <div class="bottom_content text-center pb-3">
                                    <p>CashApp: <span id="preview_cashapp">{{ $card->cashapp }}</span></p>
                                </div>
                                <div class="text-center text-light pb-3">
                                    <p id="preview_copyright">{{ $card->footer_text }}</p>
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
                                <input type="hidden" name="upload_image_url" id="upload_image_url"
                                value="{{ route('user.card.upload_image') }}" />
                                <input type="hidden" name="upload_logo_url" id="upload_logo_url"
                                    value="{{ route('user.card.upload_logo') }}" />
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3 form-input">
                                            <label for="adsname" class="form-label">Biz Ads Name <span
                                                    class="text-danger">*</span></label></label>
                                            <input type="text" placeholder="ads name" name="adsname" id="adsname"
                                                class="form-control @error('adsname') is-invalid @enderror"
                                                tabindex="{{ $tabindex++ }}" value="{{ $card->adsname }}" required>
                                            @if ($errors->has('adsname'))
                                            <span class="help-block text-danger">{{ $errors->first('adsname') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3 form-input" id="textfield">
                                            <label for="color" class="form-label">Biz Ad Color</label>
                                            <div class="input-group custome_color">
                                                <label for="theme_color" class="input-group-text">
                                                    <img src="{{ asset('images/color-picker.png') }}" width="25"
                                                        alt="color picker">
                                                    <input type="color" placeholder="card color" name="theme_color"
                                                        id="theme_color"
                                                        class="form-control @error('theme_color') is-invalid @enderror"
                                                        tabindex="{{ $tabindex++ }}" value="{{ $card->theme_color }}"
                                                        required>
                                                </label>
                                                <input type="text" id="theme_clr_code" class="form-control"
                                                    value="{{ $card->theme_color }}" disabled>
                                            </div>
                                            @if ($errors->has('color'))
                                            <span class="help-block text-danger">{{ $errors->first('color') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3 form-input">
                                            <label for="header_backgroung" class="form-label">Header background
                                                color</label>
                                            <div class="input-group custome_color">
                                                <label for="header_backgroung" class="input-group-text">
                                                    <img src="{{ asset('images/color-picker.png') }}" width="25"
                                                        alt="color picker">
                                                    <input type="color" placeholder="card color"
                                                        name="header_backgroung" id="header_backgroung"
                                                        value="{{ $card->header_backgroung }}"
                                                        class="form-control @error('header_backgroung') is-invalid @enderror"
                                                        tabindex="{{ $tabindex++ }}" required>
                                                </label>
                                                <input type="text" id="theme_back_code" class="form-control"
                                                    value="{{ $card->header_backgroung }}" disabled>
                                            </div>

                                            @if ($errors->has('header_backgroung'))
                                            <span class="help-block text-danger">{{ $errors->first('header_backgroung')
                                                }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3 form-input">
                                            <label for="selectField1" class="form-label">Select Logo/Heading <span
                                                    class="text-danger">*</span></label></label>
                                            <select id="selectField1" name="headline" class="form-control"
                                                tabindex="{{ $tabindex++ }}" required>
                                                <option value="text" @if (!empty($card->title)) selected @endif>Heading
                                                </option>
                                                <option value="logo" @if (!empty($card->logo)) selected @endif>Logo
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row @if(!empty($card->title)) d-flex @else d-none @endif" id="headline">

                                    <div class="col-6">
                                        <div class="mb-3 form-input" id="textfield">
                                            <label for="header_text_color" class="form-label">Headline Color</label>

                                            <div class="input-group custome_color">
                                                <label for="header_text_color" class="input-group-text">
                                                    <img src="{{ asset('images/color-picker.png') }}" width="25"
                                                        alt="color picker">
                                                    <input type="color" placeholder="card color"
                                                        name="header_text_color" id="header_text_color"
                                                        value="{{ $card->header_text_color }}"
                                                        class="form-control @error('header_text_color') is-invalid @enderror"
                                                        tabindex="{{ $tabindex++ }}" required>
                                                </label>
                                                <input type="text" id="header_clr_code" class="form-control"
                                                    value="{{ $card->header_text_color }}" disabled>
                                            </div>

                                            @if ($errors->has('header_text_color'))
                                            <span class="help-block text-danger">{{ $errors->first('header_text_color')
                                                }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3 form-input">
                                            <label for="text" class="form-label">Heading</label>
                                            <input type="text" placeholder="ads heading" name="text" id="text"
                                                data-preview="preview_name" data-concat="preview_name"
                                                class="form-control cin preview_name  @error('text') is-invalid @enderror"
                                                tabindex="{{ $tabindex++ }}" value="{{ $card->title }}">
                                            @if ($errors->has('text'))
                                            <span class="help-block text-danger">{{ $errors->first('text') }}</span>
                                            @endif
                                        </div>


                                    </div>
                                </div>

                                <div class="row @if(!empty($card->logo)) d-flex @else d-none @endif" id="logofield">
                                    <div id="logofield1"></div>
                                    <div class="col-6">
                                        <div class="mb-3 form-input">
                                            <label for="logo" class="form-label">Logo</label>
                                            <input type="file" name="logo" id="logo" onchange="readURL(this);"
                                                class="form-control @error('logo') is-invalid @enderror"
                                                tabindex="{{ $tabindex++ }}">
                                            @if ($errors->has('logo'))
                                            <span class="help-block text-danger">{{ $errors->first('logo') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3 form-input">
                                            <label for="selectField2" class="form-label">Banner or Video <span
                                                    class="text-danger">*</span></label></label>
                                            <select id="selectField2" name="gallery_type" class="form-control"
                                                tabindex="{{ $tabindex++ }}" required>
                                                <option value="banner" @if ($banner_type=='banner' ) selected @endif>
                                                    Banner</option>
                                                <option value="videourl" @if ($banner_type=='videourl' ) selected
                                                    @endif>Video Url
                                                </option>
                                                <option value="videosource" @if ($banner_type=='videosource' ) selected
                                                    @endif>Uplaod Video
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3 form-input {{ $banner_type == 'banner' ? 'd-block' : 'd-none' }}"
                                            id="galleryfield">
                                            <div id="galleryfield1"></div>
                                            <label for="banner" class="form-label">Banner</label>
                                            <input type="file" name="banner" id="banner"
                                                class="form-control @error('banner') is-invalid @enderror"
                                                tabindex="{{ $tabindex++ }}">
                                            @if ($errors->has('gallery'))
                                            <span class="help-block text-danger">{{ $errors->first('gallery') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3 form-input {{ $banner_type == 'videourl' ? 'd-block' : 'd-none' }}"
                                            id="videourl">
                                            <label for="video" class="form-label">Video Url</label>
                                            <input type="url" name="video" placeholder="your video url" id="video_url"
                                                class="form-control @error('video') is-invalid @enderror"
                                                tabindex="{{ $tabindex++ }}" value="">
                                            @if ($errors->has('video'))
                                            <span class="help-block text-danger">{{ $errors->first('video') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3 form-input {{ $banner_type == 'videosource' ? 'd-block' : 'd-none' }}"
                                            id="videosource">
                                            <label for="video" class="form-label">Uplaod Video</label>
                                            <input type="file" name="video" placeholder="upload your video"
                                                id="video_file"
                                                class="form-control @error('video') is-invalid @enderror"
                                                tabindex="{{ $tabindex++ }}">
                                            @if ($errors->has('video'))
                                            <span class="help-block text-danger">{{ $errors->first('video') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="input-field gallery_image">
                                                <label class="active">Gallery<span class="img-note d-inline-block"></label>
                                                <div class="row row-cols-3 row-cols-sm-3 row-cols-md-4 row-cols-xl-5 mt-2">
                                                    @if($card->gallery && $card->gallery->count() > 0)
                                                    @foreach($card->gallery as $photo)
                                                    <div class="col" id="photo_div_{{$photo->id}}">
                                                        <div class="position-relative">
                                                            <img src="{{asset($photo->content)}}" class="img-fluid"
                                                                width="100%" height="auto">
                                                            <button type="button"
                                                                class="delete-image btn btn-sm btn-danger photo-delete"
                                                                data-id="{{$photo->id}}">
                                                                <i class="iui-close"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @endif
                                                </div>
                                                <div class="prod_def_photo_upload py-2" title="Click for photo upload"></div>
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
                                                <span class="help-block text-danger">{{ $errors->first('phone_number')
                                                    }}</span>
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
                                                <span class="help-block text-danger">{{ $errors->first('email')
                                                    }}</span>
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
                                                <span class="help-block text-danger">{{ $errors->first('website')
                                                    }}</span>
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
                                                <span class="help-block text-danger">{{ $errors->first('facebook')
                                                    }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3 form-input">
                                                <label for="instagram" class="form-label">Instagram</label>
                                                <input type="text" name="instagram" id="instagram" data-type="instagram"
                                                    placeholder="instagram username"
                                                    class="social_item_in form-control @error('instagram') is-invalid @enderror"
                                                    tabindex="{{ $tabindex++ }}"
                                                    value="{{ getInputValue($card->id, 'instagram') }}">
                                                @if ($errors->has('instagram'))
                                                <span class="help-block text-danger">{{ $errors->first('instagram')
                                                    }}</span>
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
                                                <span class="help-block text-danger">{{ $errors->first('cashapp')
                                                    }}</span>
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
                                                <span class="help-block text-danger">{{
                                                    $errors->first('personalized_link')
                                                    }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        @endif
                                        <div class="col-12">
                                            <div class="mb-3 form-input">
                                                <label for="footer_text" class="form-label">Copyright</label>
                                                <input type="text" data-preview="preview_copyright" name="footer_text" placeholder="copyright"
                                                    id="footer_text"
                                                    class="form-control cin @error('footer_text') is-invalid @enderror"
                                                    tabindex="{{ $tabindex++ }}" value="{{ $card->footer_text }}">
                                                @if ($errors->has('footer_text'))
                                                <span class="help-block text-danger">{{ $errors->first('footer_text')
                                                    }}</span>
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


@push('custom-js')
<script type="text/javascript" src="{{ asset('assets/js/slim.kickstart.min.js') }}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/js/card.js') }}"></script>
<script src="{{ asset('assets/js/image-uploader.min.js') }}"></script>
<script src="{{ asset('js/croppie.js') }}"></script>
@include('image_crop')

<script>
    $(function () {
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
        $(document).on('input', '#theme_color,#theme_clr_code', function(e) {
            var current_color = $("#theme_color").val();
            console.log(current_color);
            let hex2rgb = hexToRgb(current_color);
            let rgb = hex2rgb.toString();
            $('.social_item').find('i').css('border-color', current_color);
            $('.subscribe-btn').css({
                'background-color': current_color
            });
            $('.purchase_btn').find('a').css({
                'background-color': 'rgba(' + rgb + ',.1' + ')'
            });
            $('.card_template').css({
                'background-color': 'rgba(' + rgb + ',.1' + ')'
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

        $(document).on('input', '#theme_back_code', function(e) {
            var current_color = $("#theme_back_code").val();
            $("#header_backgroung").val(current_color);
            $('.card_title').css({
                'background-color': current_color
            });
        })

        $(document).on('input', '#header_text_color', function(e) {
            var current_color = $("#header_text_color").val();
            $('.gallery-btn').find('i').css('color',current_color);
            $('.login_btn').find('svg').attr('stroke',current_color);
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
                $('#previewLogo')
                    .attr('src', e.target.result);
                // .width(150)
                // .height(200);
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
    $(document).on('click','.photo-delete', function(e){
        var id = $(this).attr('data-id');
        if (!confirm('Are you sure you want to delete the photo')) {
            return false;
        }
        if ('' != id) {
            var pageurl = `{{ URL::to('user/card/gallery-delete')}}/`+id;
            $.ajax({
                type:'get',
                url:pageurl,
                async :true,
                beforeSend: function () {
                    $("body").css("cursor", "progress");
                },
                success: function (response) {
                    if(response.status == true ){
                        $('#photo_div_'+id).hide();
                    } else {
                        alert('something wrong please you should reload the page');
                    }
                },
                complete: function (data) {
                    $("body").css("cursor", "default");
                }
            });
        }
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
