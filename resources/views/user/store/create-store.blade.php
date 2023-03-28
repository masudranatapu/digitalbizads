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
                            {{ __('Create New WhatsApp Store') }}
                        </h2>
                    </div>

                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="dropdown">
                            <a class="btn btn-primary" type="button" href="{{ route('user.stores') }}">

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
                        <form class="card" action="{{ route('user.save.store') }}" method="post"
                            enctype="multipart/form-data">
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
                                                            <input class="form-imagecheck-input" name="theme_id"
                                                                type="radio" value="{{ $theme->theme_id }}" required
                                                                checked />
                                                            <span
                                                                class="form-imagecheck-figure text-center font-weight-bold">
                                                                <img class="w-100 h-100 object-cover"
                                                                    class="form-imagecheck-image"
                                                                    src="{{ asset('backend/img/vCards/' . $theme->theme_thumbnail) }}"
                                                                    alt="{{ $theme->theme_name }}">
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
                                                                <input class="form-colorinput-input" name="card_color"
                                                                    type="radio" value="blue" required checked />
                                                                <span class="form-colorinput-color bg-blue"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="form-colorinput form-colorinput-light">
                                                                <input class="form-colorinput-input" name="card_color"
                                                                    type="radio" value="indigo" required />
                                                                <span class="form-colorinput-color bg-indigo"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="form-colorinput">
                                                                <input class="form-colorinput-input" name="card_color"
                                                                    type="radio" value="green" required />
                                                                <span class="form-colorinput-color bg-green"></span>
                                                            </label>
                                                        </div>

                                                        <div class="col-auto">
                                                            <label class="form-colorinput">
                                                                <input class="form-colorinput-input" name="card_color"
                                                                    type="radio" value="red" required />
                                                                <span class="form-colorinput-color bg-red"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="form-colorinput">
                                                                <input class="form-colorinput-input" name="card_color"
                                                                    type="radio" value="purple" required />
                                                                <span class="form-colorinput-color bg-purple"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="form-colorinput form-colorinput-light">
                                                                <input class="form-colorinput-input" name="card_color"
                                                                    type="radio" value="gray" required />
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
                                                    <select class="form-control" id="card_lang" name="card_lang" required>
                                                        @foreach (config('app.languages') as $langLocale => $langName)
                                                            <option class="dropdown-item" value="{{ $langLocale }}"
                                                                {{ $langLocale == 'en' ? 'selected' : '' }}>
                                                                {{ $langName }} ({{ strtoupper($langLocale) }})
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3 form-input">
                                                    <label class="form-label" for="header_backgroung">Header background
                                                        color</label>
                                                    <div class="input-group custome_color">
                                                        <label class="input-group-text" for="header_backgroung">
                                                            <img src="{{ asset('images/color-picker.png') }}"
                                                                alt="color picker" width="25">
                                                            <input
                                                                class="form-control @error('header_backgroung') is-invalid @enderror"
                                                                id="header_backgroung" name="header_backgroung"
                                                                type="color" value="#fff" placeholder="card color"
                                                                required>
                                                        </label>
                                                        <input class="form-control" id="theme_back_code" type="text"
                                                            value="#fff" disabled>
                                                    </div>
                                                    @if ($errors->has('header_backgroung'))
                                                        <span
                                                            class="help-block text-danger">{{ $errors->first('header_backgroung') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3 form-input">
                                                    <label class="form-label" for="header_text_color">Headline
                                                        Color</label>
                                                    <div class="input-group custome_color">
                                                        <label class="input-group-text" for="header_text_color">
                                                            <img src="{{ asset('images/color-picker.png') }}"
                                                                alt="color picker" width="25">
                                                            <input
                                                                class="form-control @error('header_text_color') is-invalid @enderror"
                                                                id="header_text_color" name="header_text_color"
                                                                type="color" value="#000" placeholder="card color"
                                                                required>
                                                        </label>
                                                        <input class="form-control" id="header_clr_code" type="text"
                                                            value="#000" disabled>
                                                    </div>
                                                    @if ($errors->has('header_text_color'))
                                                        <span
                                                            class="help-block text-danger">{{ $errors->first('header_text_color') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <div class="form-label">{{ __('Banner') }} <span
                                                            class="text-muted">({{ __('Recommended : 1920 x 550 pixels') }})</span>
                                                    </div>
                                                    <input class="form-control" name="banner" type="file"
                                                        placeholder="{{ __('Banner') }}..."
                                                        accept=".jpeg,.jpg,.png,.gif,.svg" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <div class="form-label ">{{ __('Logo') }} <span
                                                            class="text-muted">({{ __('Recommended: 180 x 90 pixels') }})</span>
                                                    </div>
                                                    <input class="form-control" name="logo" type="file"
                                                        placeholder="{{ __('Logo') }}..."
                                                        accept=".jpeg,.jpg,.png,.gif,.svg" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Store name') }}</label>
                                                    <input class="form-control" name="title" type="text"
                                                        value="{{ old('title') }}"
                                                        onload="convertToLink(this.value); checkLink()"
                                                        onkeyup="convertToLink(this.value); checkLink()"
                                                        placeholder="{{ __('Store name') }}..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Store greeting') }}</label>
                                                    <input class="form-control" name="subtitle" type="text"
                                                        value="{{ old('subtitle') }}"
                                                        placeholder="{{ __('Ex: Welcome to') }}..." required>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label required"
                                                        for="currency">{{ __('Currency') }}</label>
                                                    <select class="form-control" id="currency" name="currency" required>
                                                        @foreach ($currencies as $currency)
                                                            <option value="{{ $currency->iso_code }}">
                                                                {{ $currency->name }} ({{ $currency->symbol }})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('WhatsApp Number') }}</label>
                                                    <input class="form-control" name="whatsapp_no" type="text"
                                                        value="{{ old('whatsapp_no') }}"
                                                        placeholder="{{ __('Example: +16625491457') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Email') }}</label>
                                                    <input class="form-control" name="email" type="email"
                                                        value="{{ old('email') ?? Auth::user()->email }}"
                                                        placeholder="example@email.com">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label
                                                        class="form-label required">{{ __('WhatsApp Footer Text') }}</label>
                                                    <textarea class="form-control" name="whatsapp_msg" data-bs-toggle="autosize"
                                                        placeholder="{{ __('WhatsApp Footer Text') }}..." required>{{ __('Thanks for shopping with us.') }}</textarea>
                                                </div>
                                            </div>

                                            @if ($plan_details->personalized_link)
                                                <div class="col-md-10 col-xl-10 mt-3">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('Personalized Link') }}</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                {{ URL::to('/') }}
                                                            </span>
                                                            <input class="form-control" id="plink" name="link"
                                                                type="text"
                                                                placeholder="{{ __('Personalized Link') }}"
                                                                autocomplete="off" onkeyup="checkLink()" minlength="3"
                                                                required>
                                                        </div>
                                                        <p id="status"></p>
                                                    </div>
                                                </div>
                                            @endif

                                        </div>

                                        <div class="col-md-4 col-xl-4 my-3">
                                            <div class="mb-3">
                                                <button class="btn btn-primary" type="submit">
                                                    {{ __('Save') }}
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
@endsection

@push('script')
    <script>
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

        $(function() {
            // show color code

            $('#header_backgroung').on('input', function() {
                $('#theme_back_code').val(this.value);
            });

            $('#header_text_color').on('input', function() {
                $('#header_clr_code').val(this.value);
            });



        });
    </script>
@endpush
