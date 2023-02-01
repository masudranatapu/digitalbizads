@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])
@section('content')

<style>
    span.error {
    color: #E53935;
    padding: 2px 0px;
}
</style>
<?php
    $tabindex = 1;


    if(!empty($card->gallery[0])){
        if ($card->gallery[0]['gallery_type']=='gallery'){
            $gallery_type ='gallery';
        }
        elseif ($card->gallery[0]['gallery_type']=='videourl') {
            $gallery_type ='videourl';
        }
        elseif ($card->gallery[0]['gallery_type']=='videosource') {
            $gallery_type ='videosource';
        }
    }else{
        $gallery_type = 'gallery';
    }

    // dd($card->contacts);
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
                                <div class="card_title p-2 pt-3">
                                    <h2>
                                        <span>Express T-Shirts</span>
                                        <a href="javascript:void(0)" class="float-end login_btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                                viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                                <line x1="3" y1="18" x2="21" y2="18"></line>
                                            </svg>
                                        </a>
                                    </h2>
                                </div>
                                <!-- slider -->
                                <div class="carousel_slider">
                                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <!-- carousel item -->
                                            <div class="carousel-item active">
                                                <img src="{{ asset('backend/img') }}/1.jpg" class="d-block w-100"
                                                    alt="image">
                                            </div>
                                            <!-- carousel item -->
                                            <div class="carousel-item">
                                                <img src="{{ asset('backend/img') }}/2.jpg" class="d-block w-100"
                                                    alt="image">
                                            </div>
                                            <!-- carousel item -->
                                            <div class="carousel-item">
                                                <img src="{{ asset('backend/img') }}/3.jpg" class="d-block w-100"
                                                    alt="image">
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                viewBox="0 0 24 24" fill="none" stroke="#212121" stroke-width="1"
                                                stroke-linecap="butt" stroke-linejoin="bevel">
                                                <path d="M19 12H6M12 5l-7 7 7 7"></path>
                                            </svg>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                viewBox="0 0 24 24" fill="none" stroke="#212121" stroke-width="1"
                                                stroke-linecap="butt" stroke-linejoin="bevel">
                                                <path d="M5 12h13M12 5l7 7-7 7"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <!-- purchase button -->
                                <div class="purchase_btn text-center mb-4">
                                    <a href="{{ $card->website }}">Shop</a>
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
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-phone"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- social icon -->
                                            <div class="col">
                                                <div class="social_item">
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-envelope"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- social icon -->
                                            <div class="col">
                                                <div class="social_item">
                                                    <a href="#" target="_blank">
                                                        <i class="fa fa-globe"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- Qr code icon -->
                                            <div class="col">
                                                <div class="social_item qrcode_icon">
                                                    <a href="javascript:void(0)" target="_blank">
                                                        <img src="{{ asset('backend/img') }}/icon/qr-code.svg"
                                                            alt="qr-code">
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- social icon -->
                                            <div class="col">
                                                <div class="social_item">
                                                    <a href="#" target="_blank">
                                                        <i class="fab fa-facebook"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- social icon -->
                                            <div class="col">
                                                <div class="social_item">
                                                    <a href="#" target="_blank">
                                                        <i class="fab fa-instagram"></i>
                                                    </a>
                                                </div>
                                            </div>
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
                                                class="input-group-text btn btn-primary">Subscribe</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- copyright -->
                                <div class="bottom_content text-center pb-3">
                                    <p>CashApp: $SBOWEN2005</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-xl-7">
                    <div class="card card_form">
                        <div class="card-body">
                            <form action="{{ route('user.card.store') }}" method="post" id="card-form" novalidate="novalidate" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3 form-input">
                                            <label for="adsname" class="form-label">DigitalBizAds Name</label>
                                            <input type="text" placeholder="ads name" name="adsname" id="adsname" class="form-control @error('adsname') is-invalid @enderror" tabindex="{{ $tabindex++ }}"
                                            value="{{ $card->adsname }}">
                                            @if ($errors->has('adsname'))
                                                <span class="help-block text-danger">{{$errors->first('adsname') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3 form-input" id="textfield">
                                            <label for="color" class="form-label">DigitalBizAds Color</label>
                                            <input type="color" placeholder="card color" name="theme_color" id="theme_color" class="form-control @error('theme_color') is-invalid @enderror" tabindex="{{ $tabindex++ }}" value="{{ $card->theme_color }}">
                                            @if ($errors->has('color'))
                                                <span class="help-block text-danger">{{$errors->first('color') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3 form-input">
                                            <label for="" class="form-label">Select Logo/Heading</label>
                                            <select id="selectField1" class="form-control" tabindex="{{ $tabindex++ }}">
                                                <option value="text" @if (!empty($card->title)) selected @endif>Heading</option>
                                                <option value="logo" @if (!empty($card->logo)) selected @endif>Logo</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3 form-input" id="headline">
                                            <label for="text" class="form-label">Heading</label>
                                            <input type="text" placeholder="ads heading" name="text" id="text" class="form-control @error('text') is-invalid @enderror" tabindex="{{ $tabindex++ }}" value="{{ $card->title }}">
                                            @if ($errors->has('text'))
                                                <span class="help-block text-danger">{{$errors->first('text') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3 d-none form-input" id="logofield">
                                            <label for="logo" class="form-label">Logo</label>
                                            <input type="file" name="logo" id="logo" class="form-control @error('logo') is-invalid @enderror" tabindex="{{ $tabindex++ }}">
                                            @if ($errors->has('logo'))
                                                <span class="help-block text-danger">{{$errors->first('logo') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3 form-input">
                                            <label for="" class="form-label">Gallery or Video</label>
                                            <select id="selectField2" name="gallery_type" class="form-control" tabindex="{{ $tabindex++ }}">
                                                <option value="gallery" @if ($gallery_type=='gallery') selected @endif>Gallery</option>
                                                <option value="videourl" @if ($gallery_type=='videourl') selected @endif>Video Url</option>
                                                <option value="videosource" @if ($gallery_type=='videosource') selected @endif>Uplaod Video</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3 form-input {{ $gallery_type=='gallery' ? 'd-block':'d-none' }}" id="galleryfield">
                                            <label for="gallery" class="form-label">Gallery (Select Multiple Images)</label>
                                            <input type="file" name="gallery[]" id="gallery" class="form-control @error('gallery') is-invalid @enderror" tabindex="{{ $tabindex++ }}" multiple required>
                                            @if ($errors->has('gallery'))
                                                <span class="help-block text-danger">{{$errors->first('gallery') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3 form-input {{ $gallery_type=='videourl' ? 'd-block':'d-none' }}" id="videourl">
                                            <label for="video" class="form-label">Video Url</label>
                                            <input type="text" name="video" placeholder="your video url" id="video" class="form-control @error('video') is-invalid @enderror" tabindex="{{ $tabindex++ }}" value="{{ $card->gallery[0]['content'] }}">
                                            @if ($errors->has('video'))
                                                <span class="help-block text-danger">{{$errors->first('video') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3 form-input {{ $gallery_type=='videosource' ? 'd-block':'d-none' }}" id="videosource">
                                            <label for="video" class="form-label">Uplaod Video</label>
                                            <input type="file" name="video" placeholder="upload your video" id="video" class="form-control @error('video') is-invalid @enderror" tabindex="{{ $tabindex++ }}">
                                            @if ($errors->has('video'))
                                                <span class="help-block text-danger">{{$errors->first('video') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                              <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 form-input">
                                            <label for="phone_number" class="form-label">Phone</label>
                                            <input type="number" name="phone_number" id="phone_number" placeholder="your phone" class="form-control @error('phone') is-invalid @enderror" tabindex="{{ $tabindex++ }}" value="{{ $card->phone_number }}">
                                            @if ($errors->has('phone_number'))
                                                <span class="help-block text-danger">{{$errors->first('phone_number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 form-input">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" placeholder="your email" id="email" class="form-control @error('email') is-invalid @enderror" tabindex="{{ $tabindex++ }}" value="{{ $card->email }}">
                                            @if ($errors->has('email'))
                                                <span class="help-block text-danger">{{$errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 form-input">
                                            <label for="website" class="form-label">Website</label>
                                            <input type="text" name="website" placeholder="your website" id="website" class="form-control @error('website') is-invalid @enderror" tabindex="{{ $tabindex++ }}" value="{{ $card->website }}">
                                            @if ($errors->has('website'))
                                                <span class="help-block text-danger">{{$errors->first('website') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 form-input">
                                            <label for="facebook" class="form-label">Facebook</label>
                                            <input type="text" name="facebook" placeholder="facebook username" id="facebook" class="form-control @error('facebook') is-invalid @enderror" tabindex="{{ $tabindex++ }}" value="{{ $card->facebook }}">
                                            @if ($errors->has('facebook'))
                                                <span class="help-block text-danger">{{$errors->first('facebook') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 form-input">
                                            <label for="instagram" class="form-label">Instagram</label>
                                            <input type="text" name="instagram" id="instagram" placeholder="instagram username" class="form-control @error('instagram') is-invalid @enderror" tabindex="{{ $tabindex++ }}" value="{{ $card->instagram }}">
                                            @if ($errors->has('instagram'))
                                                <span class="help-block text-danger">{{$errors->first('instagram') }}</span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="mb-3 form-input">
                                            <label for="cashapp" class="form-label">CashApp</label>
                                            <input type="text" name="cashapp" id="cashapp" placeholder="cashapp username" value="{{ $card->cashapp }}" class="form-control @error('cashapp') is-invalid @enderror" tabindex="{{ $tabindex++ }}">
                                            @if ($errors->has('cashapp'))
                                                <span class="help-block text-danger">{{$errors->first('cashapp') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    @if ($plan_details->personalized_link=='1')
                                    <div class="col-6">
                                        <div class="mb-3 form-input">
                                            <label for="personalized_link" class="form-label">Personalized Link</label>
                                            <input type="text" placeholder="Personalized Link" name="personalized_link" id="personalized_link" class="form-control @error('gallery_type') is-invalid @enderror" value="{{ $card->card_url }}" tabindex="{{ $tabindex++ }}">
                                            @if ($errors->has('personalized_link'))
                                                <span class="help-block text-danger">{{$errors->first('personalized_link') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-12">
                                        <div class="mb-3 form-input">
                                            <label for="footer_text" class="form-label">Copyright</label>
                                            <input type="text" name="footer_text" placeholder="copyright" id="footer_text" class="form-control @error('footer_text') is-invalid @enderror" tabindex="{{ $tabindex++ }}" value="{{ $card->footer_text }}">
                                            @if ($errors->has('footer_text'))
                                                <span class="help-block text-danger">{{$errors->first('footer_text') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Update Your DigitalBizAds</button>
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

@push('custom-js')



<script src="{{ asset('js/jquery.validate.min.js') }}"></script>

<script>
    $(document).ready(function(){
     // logo and text field
      $("#selectField1").change(function(){
        var selected = $(this).val();
        if(selected === "logo"){
            $('#headline').addClass('d-none');
            $('#logofield').removeClass('d-none');
        }else{
            $('#headline').removeClass('d-none');
            $('#logofield').addClass('d-none');
        }
      });

      // gallery and video fiedl
      $("#selectField2").change(function(){
        var selected2 = $(this).val();
        if(selected2 === "videourl"){
            $('#galleryfield').addClass('d-none');
            $('#videourl').removeClass('d-none');
            $('#videosource').addClass('d-none');
        }else if(selected2 === "videosource"){
            $('#galleryfield').addClass('d-none');
            $('#videourl').addClass('d-none');
            $('#videosource').removeClass('d-none');
        }else{
            $('#galleryfield').removeClass('d-none');
            $('#videourl').addClass('d-none');
            $('#videosource').addClass('d-none');
        }
      });
    });
    function checkLink(){
    "use strict";
    var plink = $('#plink').val();
    if(plink.length > 2){

    $.ajax({
    url: "{{ route('user.check.link') }}",
    method: 'POST',
    data:{_token: "{{ csrf_token() }}", link: plink},
    }).done(function(res) {
        if(res.status == 'success') {
            $('#status').html("<span class='badge mt-2 bg-green'>{{ __('Available') }}</span>");
        }else{
            $('#status').html("<span class='badge mt-2 bg-red'>{{ __('Not available') }}</span>");
        }
    });
}else{
    $('#status').html("");
}
}

/* Encode string to link */
function convertToLink( str ) {
    "use strict";
    str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ')
             .toLowerCase();
    str = str.replace(/^\s+|\s+$/gm,'');
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
            // 'location': {
            //     required: false,
            //     maxlength: 124,
            //     minlength: 2,
            // },
            // 'designation': {
            //     required: true,
            //     maxlength: 124,
            //     minlength: 2,
            // },
            // 'company_name': {
            //     required: true,
            //     maxlength: 124,
            //     minlength: 2,
            // },
            // 'bio': {
            //     required: false,
            //     maxlength: 255,
            // },
        },
        messages: {},
        // submitHandler: function(form) {
        //     $('.save-card-spinner').addClass('active');
        //     $(this).find('.save-card').prop('disabled', true);
        //     $(".btn-txt").text("Processing ...");
        //     setTimeout(function(){
        //         $(".save-card-spinner").removeClass("active");
        //         $('.save-card').attr("disabled", false);
        //         $(".btn-txt").text("Save");
        //     }, 50000);
        //     form.submit();

        // },
          errorPlacement: function(error, element) {
            $(element).parents('.form-input').append(error)
        },
    });



</script>
@endpush
@endsection
