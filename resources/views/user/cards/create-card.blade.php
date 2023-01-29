@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])

@section('content')
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

                <!--
                    <form action="{{ route('user.save.business.card') }}" method="post" enctype="multipart/form-data"
                        class="card">
                        @csrf
                        {{-- Create Card --}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5 col-xl-5">
                                    <div class="mb-3">
                                        <div class="row g-2">
                                            @foreach ($themes as $theme)
                                            <div class="col-lg-5 col-sm-6 col-md-6 col-6">
                                                <label class="form-imagecheck mb-2">
                                                    <input type="radio" name="theme_id" value="{{ $theme->theme_id }}"
                                                        class="form-imagecheck-input" required checked />
                                                    <span class="form-imagecheck-figure text-center font-weight-bold">
                                                        <img src="{{ asset('backend/img/vCards/'.$theme->theme_thumbnail) }}"
                                                            class="w-100 h-100 object-cover"
                                                            alt="{{ $theme->theme_name }}"
                                                            class="form-imagecheck-image">
                                                        <span class="badge bg-dark">{{ $theme->theme_name }}</span>
                                                    </span>
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7 col-xl-7">
                                    <div class="row">
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Card Color') }}</label>
                                                <div class="row g-2">
                                                    <div class="col-auto">
                                                        <label class="form-colorinput">
                                                            <input name="card_color" type="radio" value="blue"
                                                                class="form-colorinput-input" required checked />
                                                            <span class="form-colorinput-color bg-blue"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label class="form-colorinput form-colorinput-light">
                                                            <input name="card_color" type="radio" value="indigo"
                                                                class="form-colorinput-input" required />
                                                            <span class="form-colorinput-color bg-indigo"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label class="form-colorinput">
                                                            <input name="card_color" type="radio" value="green"
                                                                class="form-colorinput-input" required />
                                                            <span class="form-colorinput-color bg-green"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label class="form-colorinput">
                                                            <input name="card_color" type="radio" value="yellow"
                                                                class="form-colorinput-input" required />
                                                            <span class="form-colorinput-color bg-yellow"></span>
                                                        </label>
                                                    </div>

                                                    <div class="col-auto">
                                                        <label class="form-colorinput">
                                                            <input name="card_color" type="radio" value="red"
                                                                class="form-colorinput-input" required />
                                                            <span class="form-colorinput-color bg-red"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label class="form-colorinput">
                                                            <input name="card_color" type="radio" value="purple"
                                                                class="form-colorinput-input" required />
                                                            <span class="form-colorinput-color bg-purple"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label class="form-colorinput">
                                                            <input name="card_color" type="radio" value="pink"
                                                                class="form-colorinput-input" required />
                                                            <span class="form-colorinput-color bg-pink"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label class="form-colorinput form-colorinput-light">
                                                            <input name="card_color" type="radio" value="gray"
                                                                class="form-colorinput-input" required />
                                                            <span class="form-colorinput-color bg-muted"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="card_lang">{{ __('Language') }} <span
                                                        class="text-danger">*</span></label>
                                                <select name="card_lang" id="card_lang" class="form-control" required>
                                                    @foreach(config('app.languages') as $langLocale => $langName)
                                                    <option class="dropdown-item" value="{{ $langLocale }}" {{
                                                        $langLocale=='en' ? 'selected' : '' }}>
                                                        {{ $langName }} ({{ strtoupper($langLocale) }})
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <div class="form-label required">{{ __('Cover') }}</div>
                                                <input type="file" class="form-control" name="cover"
                                                    placeholder="{{ __('Cover') }}..." required
                                                    accept=".jpeg,.jpg,.png,.gif,.svg" />
                                                <small class="text-muted">{{ __('Recommended : 604 x 250 pixels')
                                                    }}</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <div class="form-label required">{{ __('Logo') }}</div>
                                                <input type="file" class="form-control" name="logo"
                                                    placeholder="{{ __('Logo') }}..." required
                                                    accept=".jpeg,.jpg,.png,.gif,.svg" />
                                                <small class="text-muted">{{ __('Recommended : 500 x 500 pixels')
                                                    }}</small>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Title') }}</label>
                                                <input type="text" class="form-control" name="title"
                                                    onload="convertToLink(this.value); checkLink()"
                                                    onkeyup="convertToLink(this.value); checkLink()"
                                                    value="{{ old('title') }}"
                                                    placeholder="{{ __('Business name / Your name') }}..." required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Sub Title') }}</label>
                                                <input type="text" class="form-control" name="subtitle"
                                                    value="{{ old('subtitle') }}"
                                                    placeholder="{{ __('Location / Job title') }}..." required>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-xl-12">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Description') }}</label>
                                                <textarea class="form-control" name="description"
                                                    data-bs-toggle="autosize"
                                                    placeholder="{{ __('About business / Bio') }}..."
                                                    required>{{ old('description') }}</textarea>
                                            </div>
                                        </div>

                                        @if ($plan_details->personalized_link)
                                        <div class="col-md-10 col-xl-10">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Personalized Link') }}</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        {{ URL::to('/') }}
                                                    </span>
                                                    <input type="text" class="form-control" name="link"
                                                        placeholder="{{ __('Personalized Link') }}" autocomplete="off"
                                                        id="plink" onkeyup="checkLink()" value="{{ old('link') }}"
                                                        minlength="3" required>
                                                </div>
                                                <p id="status"></p>
                                            </div>
                                        </div>
                                        @endif

                                    </div>

                                    <div class="col-md-4 col-xl-4 my-3">
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Submit & Next') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    -->


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
                            <form action="#" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="" class="form-label">Text or Logo</label>
                                    <select id="selectField1" class="form-control">
                                        <option value="text">Text</option>
                                        <option value="logo">Logo</option>
                                    </select>
                                </div>
                                <div class="mb-3" id="textfield">
                                    <label for="text" class="form-label">Text</label>
                                    <input type="text" name="text" id="text" class="form-control">
                                </div>
                                <div class="mb-3 d-none" id="logofield">
                                    <label for="logo" class="form-label">Logo</label>
                                    <input type="file" name="logo" id="logo" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Gallery or Video</label>
                                    <select id="selectField2" class="form-control">
                                        <option value="gallery">Gallery</option>
                                        <option value="video">Video</option>
                                    </select>
                                </div>
                                <div class="mb-3" id="galleryfield">
                                    <label for="gallery" class="form-label">Gallery (Select multiple image)</label>
                                    <input type="file" name="gallery[]" id="gallery" class="form-control" required>
                                </div>
                                <div class="mb-3 d-none" id="videofield">
                                    <label for="video" class="form-label">Logo</label>
                                    <input type="text" name="video" id="video" class="form-control">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="number" name="phone" id="phone" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" id="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="website" class="form-label">Website</label>
                                            <input type="text" name="website" id="website" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="facebook" class="form-label">Facebook</label>
                                            <input type="text" name="facebook" id="facebook" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="instagram" class="form-label">Instagram</label>
                                            <input type="text" name="instagram" id="instagram" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="foote_text" class="form-label">Footer Text</label>
                                    <input type="text" name="foote_text" id="foote_text" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Save</button>
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

<script>
    $(document).ready(function(){
     // logo and text field
      $("#selectField1").change(function(){
        var selected = $(this).val();
        if(selected === "logo"){
            $('#textfield').addClass('d-none');
            $('#logofield').removeClass('d-none');
        }else{
            $('#textfield').removeClass('d-none');
            $('#logofield').addClass('d-none');
        }
      });

      // gallery and video fiedl
      $("#selectField2").change(function(){
        var selected2 = $(this).val();
        if(selected2 === "video"){
            $('#galleryfield').addClass('d-none');
            $('#videofield').removeClass('d-none');
        }else{
            $('#galleryfield').removeClass('d-none');
            $('#videofield').addClass('d-none');
        }
      });
    });
</script>



<script>
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
    //replace all special characters | symbols with a space
    str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ')
             .toLowerCase();

    // trim spaces at start and end of string
    str = str.replace(/^\s+|\s+$/gm,'');

    // replace space with dash/hyphen
    str = str.replace(/\s+/g, '-');
    document.getElementById("plink").value = str;
    //return str;
  }
</script>
@endpush
@endsection
