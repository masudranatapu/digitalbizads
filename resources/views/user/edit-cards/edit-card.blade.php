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
                            {{ __('Edit Business Card') }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <div class="col-sm-12 col-lg-12">
                        <form class="card" action="{{ route('user.update.business.card', Request::segment(3)) }}"
                            method="post" enctype="multipart/form-data">
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
                                                            <input class="form-imagecheck-input" name="theme_id"
                                                                type="radio" value="{{ $theme->theme_id }}" required
                                                                {{ $theme->theme_id == $business_card->theme_id ? 'checked' : '' }} />
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
                                                                    type="radio" value="blue"
                                                                    {{ $business_card->theme_color == 'blue' ? 'checked' : '' }} />
                                                                <span class="form-colorinput-color bg-blue"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="form-colorinput form-colorinput-light">
                                                                <input class="form-colorinput-input" name="card_color"
                                                                    type="radio" value="indigo"
                                                                    {{ $business_card->theme_color == 'indigo' ? 'checked' : '' }} />
                                                                <span class="form-colorinput-color bg-indigo"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="form-colorinput">
                                                                <input class="form-colorinput-input" name="card_color"
                                                                    type="radio" value="green"
                                                                    {{ $business_card->theme_color == 'green' ? 'checked' : '' }} />
                                                                <span class="form-colorinput-color bg-green"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="form-colorinput">
                                                                <input class="form-colorinput-input" name="card_color"
                                                                    type="radio" value="yellow"
                                                                    {{ $business_card->theme_color == 'yellow' ? 'checked' : '' }} />
                                                                <span class="form-colorinput-color bg-yellow"></span>
                                                            </label>
                                                        </div>

                                                        <div class="col-auto">
                                                            <label class="form-colorinput">
                                                                <input class="form-colorinput-input" name="card_color"
                                                                    type="radio" value="red"
                                                                    {{ $business_card->theme_color == 'red' ? 'checked' : '' }} />
                                                                <span class="form-colorinput-color bg-red"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="form-colorinput">
                                                                <input class="form-colorinput-input" name="card_color"
                                                                    type="radio" value="purple"
                                                                    {{ $business_card->theme_color == 'purple' ? 'checked' : '' }} />
                                                                <span class="form-colorinput-color bg-purple"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="form-colorinput">
                                                                <input class="form-colorinput-input" name="card_color"
                                                                    type="radio" value="pink"
                                                                    {{ $business_card->theme_color == 'pink' ? 'checked' : '' }} />
                                                                <span class="form-colorinput-color bg-pink"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label class="form-colorinput form-colorinput-light">
                                                                <input class="form-colorinput-input" name="card_color"
                                                                    type="radio" value="gray"
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
                                                    <select class="form-control" id="card_lang" name="card_lang" required>
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
                                                <div class="mb-3">
                                                    <div class="form-label required">{{ __('Cover') }}</div>
                                                    <input class="form-control" name="cover" type="file"
                                                        value="{{ $business_card->cover }}"
                                                        placeholder="{{ __('Cover') }}..."
                                                        accept=".jpeg,.jpg,.png,.gif,.svg" />
                                                    <small
                                                        class="text-muted">{{ __('Recommended : 604 x 250 pixels') }}</small>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <div class="form-label required">{{ __('Logo') }}</div>
                                                    <input class="form-control" name="logo" type="file"
                                                        value="{{ $business_card->logo }}"
                                                        placeholder="{{ __('Logo') }}..."
                                                        accept=".jpeg,.jpg,.png,.gif,.svg" />
                                                    <small
                                                        class="text-muted">{{ __('Recommended : 500 x 500 pixels') }}</small>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Title') }}</label>
                                                    <input class="form-control" name="title" type="text"
                                                        value="{{ $business_card->title }}"
                                                        onload="convertToLink(this.value); checkLink()"
                                                        onkeyup="convertToLink(this.value); checkLink()"
                                                        placeholder="{{ __('Business name / Your name') }}..." required>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Sub Title') }}</label>
                                                    <input class="form-control" name="subtitle" type="text"
                                                        value="{{ $business_card->sub_title }}"
                                                        placeholder="{{ __('Location / Job title') }}..." required>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-xl-12">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Description') }}</label>
                                                    <textarea class="form-control" name="description" data-bs-toggle="autosize"
                                                        placeholder="{{ __('About business / Bio') }}..." required>{{ $business_card->description }}</textarea>
                                                </div>
                                            </div>

                                            @if ($plan_details->personalized_link)
                                                <div class="col-md-10 col-xl-10">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('Personalized Link') }}</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                {{ URL::to('/') }}
                                                            </span>
                                                            <input class="form-control" id="plink" name="link"
                                                                type="text" value="{{ $business_card->card_url }}"
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
                                                    {{ __('Submit & Next') }}
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
    </script>
@endpush
