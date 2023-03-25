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
                            {{ __('Edit WhatsApp Store') }}
                        </h2>
                    </div>

                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="dropdown">
                            <a type="button" class="btn btn-primary" href="{{ route('user.stores') }}">

                                <i class="fas fa-arrow-left"></i>&nbsp;
                                {{ __('Back') }}

                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <div class="col-sm-12 col-lg-12">
                        <form action="{{ route('user.update.store', $business_card->card_id ) }}" method="post"
                            enctype="multipart/form-data" class="card">
                            @csrf
                            {{-- Create Card --}}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5 col-xl-5">
                                        <div class="mb-3">
                                            <div class="row g-2">
                                                @foreach ($themes as $theme)
                                                    <div class="col-lg-6 col-sm-6 col-md-6 col-6">
                                                        <label class="form-imagecheck mb-2">
                                                            <input type="radio" name="theme_id"
                                                                value="{{ $theme->theme_id }}" class="form-imagecheck-input"
                                                                required
                                                                {{ $theme->theme_id == $business_card->theme_id ? 'checked' : '' }} />
                                                            <span
                                                                class="form-imagecheck-figure text-center font-weight-bold">
                                                                <img src="{{ asset('backend/img/vCards/' . $theme->theme_thumbnail) }}"
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
                                                    <label class="form-label required">{{ __('Color') }}</label>
                                                    <div class="row g-2">
                                                        <div class="col-auto">
                                                            <label class="form-colorinput">
                                                                <input name="card_color" type="radio" value="blue"
                                                                    class="form-colorinput-input"
                                                                    {{ $business_card->theme_color == 'blue' ? 'checked' : '' }} />
                                                                <span class="form-colorinput-color bg-blue"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="form-colorinput form-colorinput-light">
                                                                <input name="card_color" type="radio" value="indigo"
                                                                    class="form-colorinput-input"
                                                                    {{ $business_card->theme_color == 'indigo' ? 'checked' : '' }} />
                                                                <span class="form-colorinput-color bg-indigo"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="form-colorinput">
                                                                <input name="card_color" type="radio" value="green"
                                                                    class="form-colorinput-input"
                                                                    {{ $business_card->theme_color == 'green' ? 'checked' : '' }} />
                                                                <span class="form-colorinput-color bg-green"></span>
                                                            </label>
                                                        </div>

                                                        <div class="col-auto">
                                                            <label class="form-colorinput">
                                                                <input name="card_color" type="radio" value="red"
                                                                    class="form-colorinput-input"
                                                                    {{ $business_card->theme_color == 'red' ? 'checked' : '' }} />
                                                                <span class="form-colorinput-color bg-red"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="form-colorinput">
                                                                <input name="card_color" type="radio" value="purple"
                                                                    class="form-colorinput-input"
                                                                    {{ $business_card->theme_color == 'purple' ? 'checked' : '' }} />
                                                                <span class="form-colorinput-color bg-purple"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="form-colorinput form-colorinput-light">
                                                                <input name="card_color" type="radio" value="gray"
                                                                    class="form-colorinput-input"
                                                                    {{ $business_card->theme_color == 'gray' ? 'checked' : '' }} />
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
                                                        @foreach (config('app.languages') as $langLocale => $langName)
                                                            <option class="dropdown-item" value="{{ $langLocale }}"
                                                                {{ strtolower($business_card->card_lang) == $langLocale ? 'selected' : '' }}>
                                                                {{ $langName }} ({{ strtoupper($langLocale) }})
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3 form-input">
                                                    <label for="header_backgroung" class="form-label">Header background color</label>
                                                    <div class="input-group custome_color">
                                                        <label for="header_backgroung" class="input-group-text">
                                                            <img src="{{ asset('images/color-picker.png') }}"
                                                                width="25" alt="color picker">
                                                            <input type="color" placeholder="card color"
                                                                name="header_backgroung" id="header_backgroung"
                                                                value="{{ old('header_backgroung') ?? $business_card->header_backgroung }}"
                                                                class="form-control @error('header_backgroung') is-invalid @enderror"
                                                                required>
                                                        </label>
                                                        <input type="text" id="theme_back_code" class="form-control"
                                                            value="{{ $business_card->header_backgroung }}" disabled>
                                                    </div>

                                                    @if ($errors->has('header_backgroung'))
                                                        <span
                                                            class="help-block text-danger">{{ $errors->first('header_backgroung') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3 form-input">
                                                    <label for="header_text_color" class="form-label">Headline
                                                        Color</label>
                                                    <div class="input-group custome_color">
                                                        <label for="header_text_color" class="input-group-text">
                                                            <img src="{{ asset('images/color-picker.png') }}"
                                                                width="25" alt="color picker">
                                                            <input type="color" placeholder="card color"
                                                                name="header_text_color" id="header_text_color"
                                                                value="{{ old('header_text_color') ?? $business_card->header_text_color }}"
                                                                class="form-control @error('header_text_color') is-invalid @enderror"
                                                                required>
                                                        </label>
                                                        <input type="text" id="header_clr_code" class="form-control"
                                                            value="{{ $business_card->header_text_color }}" disabled>
                                                    </div>

                                                    @if ($errors->has('header_text_color'))
                                                        <span class="help-block text-danger">{{ $errors->first('header_text_color') }}</span>
                                                    @endif
                                                </div>
                                            </div>



                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <div class="form-label">{{ __('Banner') }} @if($business_card->cover) <a onclick="photoShow(this)" href="javascript:void(0)" data-src="{{ getPhoto($business_card->cover) }}"> Click for show </a> @endif</div>
                                                    <input type="file" class="form-control" name="banner"
                                                        placeholder="{{ __('Banner') }}..." accept=".jpeg,.jpg,.png,.gif,.svg" />
                                                    <small class="text-muted">{{ __('Recommended : 1920 x 550 pixels') }}</small>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <div class="form-label ">{{ __('Logo') }} @if($business_card->profile) <a onclick="photoShow(this)" href="javascript:void(0)" data-src="{{ getPhoto($business_card->profile) }}"> Click for show </a> @endif</div>
                                                    <input type="file" class="form-control" name="logo"
                                                        placeholder="{{ __('Logo') }}..." accept=".jpeg,.jpg,.png,.gif,.svg" />
                                                    <small class="text-muted">{{ __('Recommended : 180 x 90 pixels') }}</small>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Store name') }}</label>
                                                    <input type="text" class="form-control" name="title"
                                                        onload="convertToLink(this.value); checkLink()"
                                                        onkeyup="convertToLink(this.value); checkLink()"
                                                        placeholder="{{ __('Store name') }}..."
                                                        value="{{ old('title') ?? $business_card->title }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Store greeting') }}</label>
                                                    <input type="text" class="form-control" name="subtitle"
                                                        placeholder="{{ __('Store greeting') }}..."
                                                        value="{{ old('sub_title') ?? $business_card->sub_title }}" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label required"
                                                        for="currency">{{ __('Currency') }}</label>
                                                    <select name="currency" id="currency" class="form-control">
                                                        @foreach ($currencies as $currency)
                                                            <option value="{{ $currency->iso_code }}"
                                                                {{ $store_details->currency == $currency->iso_code || $store_details->currency == $currency->symbol
                                                                    ? 'selected'
                                                                    : '' }}>
                                                                {{ $currency->name }} ({{ $currency->symbol }})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('WhatsApp Number') }}</label>
                                                    <input type="number" class="form-control" name="whatsapp_no"
                                                        placeholder="{{ __('For example: 919876543210 (With country code)') }}..."
                                                        value="{{ old('whatsapp_no') ?? $store_details->whatsapp_no }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Email') }}</label>
                                                    <input type="email" class="form-control" name="email"
                                                        placeholder="example@email.com"
                                                        @if(isset($store_details->email)) value="{{ old('email') ?? $store_details->email }}" @endif>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Shop link name') }}</label>
                                                    <input type="text" class="form-control" name="shop_link_name"
                                                        placeholder="SHOP"
                                                        value="{{ old('shop_link_name') ?? $business_card->shop_link_name }}" required >
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-xl-12">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('WhatsApp Footer Text') }}</label>
                                                    <textarea class="form-control" name="whatsapp_msg" id="whatsapp_msg" cols="10" rows="3"
                                                        placeholder="{{ __('WhatsApp Footer Text') }}...">{{ old('whatsapp_msg') ?? $store_details->whatsapp_msg }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('Store Link') }}</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"> {{ URL::to('/') }} </span>
                                                        <input type="text" class="form-control"
                                                            name="personalized_link"
                                                            placeholder="{{ __('Personalized Link') }}"
                                                            autocomplete="off"
                                                            id="personalized_link"
                                                            minlength="3"
                                                            value="{{ old('personalized_link') ?? $business_card->card_url }}"
                                                            {{ $plan_details->personalized_link != '1'  ? 'disabled' : ''}}
                                                              />
                                                    </div>
                                                    @if ($errors->has('personalized_link'))
                                                        <span class="help-block text-danger">{{ $errors->first('personalized_link') }}</span>
                                                    @endif
                                                    <p id="status"></p>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-4 col-xl-4 my-3">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Update') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('user.includes.footer')
    </div>


    <div class="modal modal-blur fade" id="photoModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="float-end" data-bs-dismiss="modal">{{ __('Close') }}</button>
                </div>
                <div class="modal-body">
                    <img src="" id="product_img" style="width: 100%" />
                </div>

            </div>
        </div>
    </div>

    @endsection

    @push('custom-js')
        <script>
            $(function() {
                // show color code

                $('#header_backgroung').on('input', function() {
                    $('#theme_back_code').val(this.value);
                });

                $('#header_text_color').on('input', function() {
                    $('#header_clr_code').val(this.value);
                });



            });

            function checkLink() {
                "use strict";
                var plink = $('#plink').val();
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
                //replace all special characters | symbols with a space
                str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ')
                    .toLowerCase();

                // trim spaces at start and end of string
                str = str.replace(/^\s+|\s+$/gm, '');

                // replace space with dash/hyphen
                str = str.replace(/\s+/g, '-');
                document.getElementById("plink").value = str;
                //return str;
            }



            function photoShow(event) {
                    const {
                        src
                    } = event.dataset;

                    $('#photoModal').modal('show');
                    $('#product_img').prop('src', src);
            }
        </script>
    @endpush

