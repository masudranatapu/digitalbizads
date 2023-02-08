@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])
@section('card-create', 'active')
@section('title')
Create New DigitalBizAds Card
@endsection
@section('content')
@section('css')
<link href="{{ asset('assets/css/image-uploader.min.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slim.min.css') }}" />

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
        top: 23px;
        right: 52px;
        font-size: 20px;
        /* color: #0d6efd !important; */
    }
</style>
@endsection
<?php
$tabindex = 1;
$android = stripos($_SERVER['HTTP_USER_AGENT'], 'android');
$iphone = stripos($_SERVER['HTTP_USER_AGENT'], 'iphone');
$ipad = stripos($_SERVER['HTTP_USER_AGENT'], 'ipad');

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
                                <div class="card_title p-2 pt-3" id="titleDiv">
                                    <h2 class="">
                                        <span id="preview_name">Express T-Shirts</span>
                                        <a href="javascript:void(0)" class="gallery-btn" data-bs-toggle="modal"
                                            data-bs-target="#galleryModal">
                                            <i class="fas fa-images"></i>
                                        </a>
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
                                <div class="card_title p-2 pt-3 d-none" id="logoDiv">
                                    <h2 class="">
                                        <div class="text-center">
                                            <img src="{{ asset('assets/images/bizads.png') }}" width="140"
                                                id="previewLogo" alt="logo">
                                        </div>
                                        <a href="javascript:void(0)" class="gallery-btn" data-bs-toggle="modal"
                                            data-bs-target="#galleryModal">
                                            <i class="fas fa-images"></i>
                                        </a>

                                        <a href="javascript:void(0)" class="float-end login_btn" data-bs-toggle="modal"
                                            data-bs-target="#loginModal">
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
                                <!-- slider -->
                                <div class="carousel_slider" id="digitalbizSlider">
                                    <img src="{{ asset('backend/img') }}/3.jpg" class="d-block w-100" alt="image">
                                </div>
                                <!-- Video -->
                                <div class="video_wrapper d-none" id="digitaBizSourc">
                                    <div class="ratio ratio-1x1">
                                        <video autoplay="" loop="" muted="" id="video_preview" playsinline=""
                                            data-wf-ignore="true" data-object-fit="cover" controls>
                                            <source src="{{ asset('assets/video.mp4') }}" type="video/mp4">
                                            <source src="{{ asset('assets/video.mp4') }}" type="video/ogg">
                                        </video>
                                    </div>
                                </div>

                                <div class="video_wrapper d-none" id="digitalBizEmbad">
                                    <div class="ratio ratio-1x1">
                                        <iframe width="100%" height="315" id="youtube_video_preview"
                                            src="https://www.youtube.com/embed/Fhskvloj1gE" title="YouTube video player"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen></iframe>
                                    </div>
                                </div>

                                <!-- purchase button -->
                                <div class="purchase_btn text-center mb-4">
                                    <a href="#">Shop</a>
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
                                                    <a href="" class="social-contact phone_number" target="_blank">
                                                        <i class="fa fa-phone"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- social icon -->
                                            <div class="col">
                                                <div class="social_item">
                                                    <a href="" class="social-contact user_email" target="_blank">
                                                        <i class="fa fa-envelope"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- social icon -->
                                            <div class="col">
                                                <div class="social_item">
                                                    <a href="" class="social-contact website" target="_blank">
                                                        <i class="fa fa-globe"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- Qr code icon -->
                                            <div class="col">
                                                <div class="social_item qrcode_icon">
                                                    <a href="javascript:void(0)">
                                                        <img src="{{ asset('backend/img') }}/icon/qr-code.svg" alt="qr-code">
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- social icon -->
                                            <div class="col">
                                                <div class="social_item">
                                                    <a href="" class="social-contact facebook" target="_blank">
                                                        <i class="fab fa-facebook"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- social icon -->
                                            <div class="col">
                                                <div class="social_item">
                                                    <a href="" class="social-contact instagram" target="_blank">
                                                        <i class="fab fa-instagram"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="social_item">
                                                    <a href="javascript:void(0)" class="social-contact share"
                                                        data-bs-toggle="modal" data-bs-target="#SocialModal">
                                                        <i class="fas fa-share-nodes"></i>
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
                                            <input type="text" name="email" id="email" class="form-control"
                                                placeholder="Enter your emaill..." required="">
                                            <button type="submit"
                                                class="input-group-text btn btn-primary subscribe-btn">Subscribe</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- copyright -->
                                <div class="bottom_content text-center pb-3">
                                    <p>CashApp: <span id="preview_cashapp">$SBOWEN2005</span> </p>
                                </div>
                                <div class="text-center text-light pb-3">
                                    <p id="preview_copyright">Copyright © Copyright</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-xl-7">
                    <div class="card card_form">
                        <div class="card-body">
                            <form action="{{ route('user.card.store') }}" method="post" id="card-form"
                                novalidate="novalidate" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3 form-input">
                                            <label for="adsname" class="form-label">Biz Ad Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" placeholder="ads name" name="adsname" id="adsname"
                                                class="form-control @error('adsname') is-invalid @enderror"
                                                value="{{ old('adsname') }}" tabindex="{{ $tabindex++ }}">
                                            @if ($errors->has('adsname'))
                                            <span class="help-block text-danger">{{ $errors->first('adsname') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="mb-3 form-input" id="textfield">
                                            <label class="form-label">Biz Ad Color</label>
                                            <div class="input-group custome_color">
                                                <label for="theme_color" class="input-group-text">
                                                    <img src="{{ asset('images/color-picker.png') }}" width="25"
                                                        alt="color picker">
                                                    <input type="color" placeholder="card color" name="theme_color"
                                                        id="theme_color" value="{{ old('theme_color') ?? '#ffc107' }}"
                                                        class="form-control @error('theme_color') is-invalid @enderror"
                                                        tabindex="{{ $tabindex++ }}" required>
                                                </label>
                                                <input type="text" id="theme_clr_code" class="form-control"
                                                    value="#ffc107" disabled>
                                            </div>
                                            @if ($errors->has('theme_color'))
                                            <span class="help-block text-danger">{{ $errors->first('theme_color')
                                                }}</span>
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
                                                        value="{{ old('header_backgroung') ?? "#ffc107" }}"
                                                        class="form-control @error('header_backgroung') is-invalid @enderror"
                                                        tabindex="{{ $tabindex++ }}" required>
                                                </label>
                                                <input type="text" id="theme_back_code" class="form-control"
                                                    value="#ffc107" disabled>
                                            </div>
                                            @if ($errors->has('header_backgroung'))
                                            <span class="help-block text-danger">{{
                                                $errors->first('header_backgroung')
                                                }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3 form-input">
                                            <label for="" class="form-label">Select Logo/Heading <span
                                                    class="text-danger">*</span></label></label>
                                            <select id="selectField1" name="headline" class="form-control"
                                                tabindex="{{ $tabindex++ }}" required>
                                                <option value="text">Heading</option>
                                                <option value="logo">Logo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="headline">
                                    <div class="col-6">
                                        <div class="mb-3 form-input">
                                            <label for="text" class="form-label">Heading</label>
                                            <input type="text" placeholder="ads heading" name="text"
                                                data-preview="preview_name" data-concat="preview_name" id="text"
                                                value="{{ old('text') }}"
                                                class="form-control cin preview_name @error('text') is-invalid @enderror"
                                                tabindex="{{ $tabindex++ }}">
                                            @if ($errors->has('text'))
                                            <span class="help-block text-danger">{{ $errors->first('text') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3 form-input" id="textfield">
                                            <label for="header_text_color" class="form-label">Headline Color</label>
                                            <div class="input-group custome_color">
                                                <label for="header_backgroung" class="input-group-text">
                                                    <img src="{{ asset('images/color-picker.png') }}" width="25"
                                                        alt="color picker">
                                                    <input type="color" placeholder="card color"
                                                        name="header_text_color" id="header_text_color"
                                                        value="{{ old('header_text_color') ?? '#ffffff' }}"
                                                        class="form-control @error('header_text_color') is-invalid @enderror"
                                                        tabindex="{{ $tabindex++ }}" required>
                                                </label>
                                                <input type="text" id="header_clr_code" class="form-control"
                                                    value="#ffffff">
                                            </div>
                                            @if ($errors->has('header_text_color'))
                                            <span class="help-block text-danger">{{ $errors->first('header_text_color')
                                                }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3 d-none form-input" id="logofield">
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
                                                {{-- <option value="gallery">Gallery</option> --}}
                                                <option value="banner">Banner</option>
                                                <option value="videourl">Video Url</option>
                                                <option value="videosource">Uplaod Video</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3 form-input" id="galleryfield">
                                            <label for="banner" class="form-label">Banner</label>
                                            <input type="file" name="banner" id="banner"
                                                class="form-control @error('banner') is-invalid @enderror"
                                                tabindex="{{ $tabindex++ }}" required>
                                            {{-- <input type="file" name="gallery[]" id="gallery"
                                                class="form-control @error('gallery') is-invalid @enderror"
                                                tabindex="{{ $tabindex++ }}" multiple> --}}
                                            @if ($errors->has('banner'))
                                            <span class="help-block text-danger">{{ $errors->first('banner') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3 d-none form-input" id="videourl">
                                            <label for="video" class="form-label">Video Url</label>
                                            <input type="url" name="video" placeholder="your video url"
                                                value="{{ old('video') }}" id="video_url"
                                                class="form-control @error('video') is-invalid @enderror"
                                                tabindex="{{ $tabindex++ }}">
                                            @if ($errors->has('video'))
                                            <span class="help-block text-danger">{{ $errors->first('video') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3 form-input d-none" id="videosource">
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
                                            <div class="input-field">
                                                <label class="active">Gallery<span class="img-note d-inline-block">
                                                        {{-- <i class="la la-bell"
                                                            aria-hidden="true"></i>{{trans('form.image_size')}} 800 x
                                                        800 pixels</span> --}}
                                                </label>
                                                <div class="prod_def_photo_upload" style="padding-top: .5rem;"
                                                    title="Click for photo upload"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 form-input">
                                            <label for="phone_number" class="form-label">Phone <span
                                                    class="text-danger">*</span></label></label>
                                            <input type="number" name="phone_number" id="phone" data-attr="tel:"
                                                data-type="phone_number" placeholder="your phone"
                                                value="{{ old('phone_number') }}" data-preview="preview_phone_number"
                                                class="social_item_in form-control cin @error('phone') is-invalid @enderror"
                                                tabindex="{{ $tabindex++ }}" required>
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
                                            <input type="email" name="email" data-attr="mailto:"
                                                placeholder="your email" data-type="user_email" data-type="email"
                                                id="email" value="{{ old('email') }}"
                                                class="social_item_in form-control cin @error('email') is-invalid @enderror"
                                                tabindex="{{ $tabindex++ }}" data-preview="preview_email" required>
                                            @if ($errors->has('email'))
                                            <span class="help-block text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 form-input">
                                            <label for="website" class="form-label">Website</label>
                                            <input type="url" name="website" data-attr="" placeholder="your website"
                                                data-type="website" value="https://stackoverflow.com/" id="website"
                                                class="social_item_in form-control cin  @error('website') is-invalid @enderror"
                                                tabindex="{{ $tabindex++ }}" data-preview="preview_company_websitelink"
                                                id="company_websitelink">
                                            @if ($errors->has('website'))
                                            <span class="help-block text-danger">{{ $errors->first('website') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 form-input">
                                            <label for="facebook" class="form-label">Facebook</label>
                                            <input type="text" name="facebook" data-attr="https://www.facebook.com/"
                                                placeholder="facebook username" data-type="facebook"
                                                value="{{ old('facebook') }}" id="facebook"
                                                class="social_item_in form-control @error('facebook') is-invalid @enderror"
                                                tabindex="{{ $tabindex++ }}">
                                            @if ($errors->has('facebook'))
                                            <span class="help-block text-danger">{{ $errors->first('facebook') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 form-input">
                                            <label for="instagram" class="form-label">Instagram</label>
                                            <input type="text" name="instagram" id="instagram"
                                                data-attr="https://www.instagram.com/" data-type="instagram"
                                                placeholder="instagram username" value="{{ old('instagram') }}"
                                                class="social_item_in form-control @error('instagram') is-invalid @enderror"
                                                tabindex="{{ $tabindex++ }}">
                                            @if ($errors->has('instagram'))
                                            <span class="help-block text-danger">{{ $errors->first('instagram')
                                                }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 form-input">
                                            <label for="cashapp" class="form-label">CashApp</label>
                                            <input type="text" name="cashapp" id="cashapp"
                                                placeholder="cashapp username" value="{{ old('cashapp') }}"
                                                data-preview="preview_cashapp"
                                                class="form-control cin @error('cashapp') is-invalid @enderror"
                                                tabindex="{{ $tabindex++ }}">
                                            @if ($errors->has('cashapp'))
                                            <span class="help-block text-danger">{{ $errors->first('cashapp') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    @if ($plan_details->personalized_link == '1')
                                    <div class="col-6">
                                        <div class="mb-3 form-input">
                                            <label for="personalized_link" class="form-label">Personalized
                                                Link <span class="text-danger">*</span></label></label>
                                            <input type="text" placeholder="Personalized Link" name="personalized_link"
                                                id="personalized_link"
                                                class="form-control @error('personalized_link') is-invalid @enderror"
                                                value="{{ old('personalized_link') }}" tabindex="{{ $tabindex++ }}">
                                            @if ($errors->has('personalized_link'))
                                            <span class="help-block text-danger">{{ $errors->first('personalized_link')
                                                }}</span>
                                            @endif
                                            <span id="status"></span>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-12">
                                        <div class="mb-3 form-input">
                                            <label for="footer_text" class="form-label">Copyright</label>
                                            <input type="text" name="footer_text" placeholder="copyright"
                                                id="footer_text" data-preview="preview_copyright" value="{{ old('footer_text') }}"
                                                class="form-control cin @error('footer_text') is-invalid @enderror"
                                                tabindex="{{ $tabindex++ }}">
                                            @if ($errors->has('footer_text'))
                                            <span class="help-block text-danger">{{ $errors->first('footer_text')
                                                }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary submit submitBtn">Create Your Biz
                                        Ad</button>
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
                            <label class="py-2" for="send_to">Send To</label>
                            <div class="input-group">
                                <input type="text" name="send_to" id="send_to"
                                        class="form-control @error('send_to') is-invalid @enderror" placeholder="Send to phone no"
                                        required>
                                <a href="javascript:void(0)"  class="input-group-text btn btn-dark sendto-btn">Send</a>
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
<script>
    var cropper = new Slim(document.getElementById('logo'), {
        ratio: '1:1',
        minSize: {
            width: 50,
            height: 50,
        },
        size: {
            width: 440,
            height: 440,
        },
        willSave: function(data, ready) {
            $('#showlogo_2').attr('src', data.output.image);
            // console.log(data);
            ready(data);
        },
        meta: {
            viewid: 1
        },
        download: false,
        instantEdit: true,
        // label: 'Upload: Click here or drag an image file onto it',
        buttonConfirmLabel: 'Crop',
        buttonConfirmTitle: 'Crop',
        buttonCancelLabel: 'Cancel',
        buttonCancelTitle: 'Cancel',
        buttonEditTitle: 'Edit',
        buttonRemoveTitle: 'Remove',
        buttonDownloadTitle: 'Download',
        buttonRotateTitle: 'Rotate',
        buttonUploadTitle: 'Upload',
        statusImageTooSmall: 'This photo is too small. The minimum size is 360 * 240 pixels.'
    });
var cropper = new Slim(document.getElementById('banner'), {
        ratio: '5:7',
        minSize: {
            width: 500,
            height: 700,
        },
        size: {
            width: 500,
            height: 700,
        },
        willSave: function(data, ready) {
            $('#showlogo_2').attr('src', data.output.image);
            ready(data);
        },
        meta: {
            viewid: 1
        },
        download: false,
        instantEdit: true,
        // label: 'Upload: Click here or drag an image file onto it',
        buttonConfirmLabel: 'Crop',
        buttonConfirmTitle: 'Crop',
        buttonCancelLabel: 'Cancel',
        buttonCancelTitle: 'Cancel',
        buttonEditTitle: 'Edit',
        buttonRemoveTitle: 'Remove',
        buttonDownloadTitle: 'Download',
        buttonRotateTitle: 'Rotate',
        buttonUploadTitle: 'Upload',
        statusImageTooSmall: 'This photo is too small. The minimum size is 360 * 240 pixels.'
    });

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
        $(document).on('input', '#theme_color', function(e) {
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


        // $(document).on('input', '#header_text_color', function(e) {
        //     var current_color = $("#header_text_color").val();
        //     $('#preview_name').css({
        //         'color': current_color
        //     });
        // })

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

    $(function() {
        var
            max_file_number = <?php echo $plan_details->no_of_galleries; ?>,
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
@endsection
