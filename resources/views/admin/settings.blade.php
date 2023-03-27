@extends('layouts.admin', ['header' => true, 'nav' => true, 'demo' => true])

{{-- Custom CSS --}}
@section('css')
    <style>
        .page-title {
            color: cornflowerblue !important;
        }
    </style>
@endsection

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
                        <h2 class="page-title mb-2">
                            {{ __('Settings') }}
                        </h2>
                        <span
                            class="text-muted">{{ __('Note: Some fields are disabled. You can change the respective values directly from .env file.') }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">

                {{-- Settings --}}
                <div class="card">
                    <div class="card-body">
                        <div class="accordion" id="accordion-example">
                            {{-- General Configuration Settings --}}
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-1">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-1" type="button" aria-expanded="false">
                                        <h2>{{ __('General Configuration Settings') }}</h2>
                                    </button>
                                </h2>
                                <div class="accordion-collapse collapse" id="collapse-1"
                                    data-bs-parent="#accordion-example">
                                    <div class="accordion-body pt-0">
                                        <form action="{{ route('admin.change.general.settings') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                {{-- Script Type --}}
                                                {{-- <div class="col-md-4 col-xl-4">
                                                    <div class="mb-3">
                                                        <label class="form-label required"
                                                            for="app_type">{{ __('Application Type') }}</label>
                                                        <select name="app_type" id="app_type" class="form-control"
                                                            required>
                                                            <option value="VCARD"
                                                                {{ env('APP_TYPE') == 'VCARD' ? ' selected' : '' }}>
                                                                {{ __('vCard Only') }}</option>
                                                            <option value="STORE"
                                                                {{ env('APP_TYPE') == 'STORE' ? ' selected' : '' }}>
                                                                {{ __('WhatsApp Store Only') }}</option>
                                                            <option value="BOTH"
                                                                {{ env('APP_TYPE') == 'BOTH' ? ' selected' : '' }}>
                                                                {{ __('Both') }}</option>
                                                        </select>
                                                    </div>
                                                </div> --}}

                                                {{-- Timezone --}}
                                                <div class="col-md-4 col-xl-4">
                                                    <div class="mb-3">
                                                        <label class="form-label required"
                                                            for="timezone">{{ __('Timezone') }}</label>
                                                        <select class="form-control" id="timezone" name="timezone"
                                                            required>
                                                            @foreach (timezone_identifiers_list() as $timezone)
                                                                <option value="{{ $timezone }}"
                                                                    {{ $config[2]->config_value == $timezone ? ' selected' : '' }}>
                                                                    {{ $timezone }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                {{-- Currency --}}
                                                <div class="col-md-4 col-xl-4">
                                                    <div class="mb-3">
                                                        <label class="form-label required"
                                                            for="currency">{{ __('Currency') }}</label>
                                                        <select class="form-control" id="currency" name="currency"
                                                            required>
                                                            @foreach ($currencies as $currency)
                                                                <option value="{{ $currency->iso_code }}"
                                                                    {{ $config[1]->config_value == $currency->iso_code ? ' selected' : '' }}>
                                                                    {{ $currency->name }} ({{ $currency->symbol }})
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                {{-- Default Plan Term Detting --}}
                                                <div class="col-md-4 col-xl-4">
                                                    <h2 class="page-title my-3">
                                                        {{ __('Default Plan Term Settings') }}
                                                    </h2>
                                                    <div class="mb-3">
                                                        <label class="form-label required"
                                                            for="term">{{ __('Default Plan Term') }}</label>
                                                        <select class="form-control" id="term" name="term" required>
                                                            <option value="monthly"
                                                                {{ $config[8]->config_value == 'monthly'
                                                                    ? '
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            selected'
                                                                    : '' }}>
                                                                {{ __('Monthly') }}</option>
                                                            <option value="yearly"
                                                                {{ $config[8]->config_value == 'yearly'
                                                                    ? '
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            selected'
                                                                    : '' }}>
                                                                {{ __('Yearly') }}</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                {{-- Cookie Consent Settings --}}
                                                <div class="col-md-4 col-xl-4">
                                                    <h2 class="page-title my-3">
                                                        {{ __('Cookie Consent Settings') }}
                                                    </h2>
                                                    <div class="mb-3">
                                                        <label class="form-label required"
                                                            for="cookie">{{ __('Cookie Consent Settings') }}</label>
                                                        <select class="form-control" id="cookie" name="cookie" required>
                                                            <option value="true"
                                                                {{ env('COOKIE_CONSENT_ENABLED') == 'true' ? ' selected' : '' }}>
                                                                {{ __('Enable') }}</option>
                                                            <option value=""
                                                                {{ env('COOKIE_CONSENT_ENABLED') == '' ? ' selected' : '' }}>
                                                                {{ __('Disable') }}</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                {{-- Image Upload Limit --}}
                                                <div class="col-md-4 col-xl-4 mb-2">
                                                    <h2 class="page-title my-3">
                                                        {{ __('Image Upload Limit') }}
                                                    </h2>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="image_limit">{{ __('Size') }}
                                                        </label>
                                                        <input class="form-control" name="image_limit" type="number"
                                                            value="{{ $settings->image_limit['SIZE_LIMIT'] }}"
                                                            placeholder="{{ __('Size') }}" min="1024">
                                                    </div>
                                                </div>

                                                {{-- Share Content Settings --}}
                                                <h2 class="page-title my-3">
                                                    {{ __('Share Content Settings') }}
                                                </h2>

                                                <div class="col-md-8 col-xl-8">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('Share Content') }}</label>
                                                        <textarea class="form-control" id="share_content" name="share_content" cols="10" rows="3"
                                                            placeholder="{{ __('Share Content') }}..." required>{{ $config[30]->config_value ?? '' }}</textarea>
                                                    </div>
                                                </div>

                                                {{-- Short codes --}}
                                                <div class="col-md-4 col-xl-4 mt-3">
                                                    <h2 class="text-muted"> {{ __('Short Codes :') }} </h2>
                                                    <span><span class="font-weight-bold">{ business_name }</span> -
                                                        {{ __('Business Name') }}</span><br>
                                                    <span><span class="font-weight-bold">{ business_url }</span> -
                                                        {{ __('Business URL or Address') }}</span><br>
                                                    <span><span class="font-weight-bold">{ appName }</span> -
                                                        {{ __('App Name') }}</span>
                                                </div>

                                                {{-- Tawk Chat Settings --}}
                                                <div class="col-md-6 col-xl-6">
                                                    <h2 class="page-title my-3">
                                                        {{ __('Tawk Chat Settings') }}
                                                    </h2>
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label">{{ __('Tawk Chat URL (s1.src)') }}</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                {{ __('https://embed.tawk.to/') }}
                                                            </span>
                                                            <input class="form-control" name="tawk_chat_bot_key"
                                                                type="text" value="{{ $settings->tawk_chat_bot_key }}"
                                                                placeholder="{{ __('Tawk Chat Key') }}"
                                                                autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Update button --}}
                                                <div class="text-end">
                                                    <div class="d-flex">
                                                        <button class="btn btn-primary btn-md ms-auto" type="submit">
                                                            {{ __('Update') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- Website Configuration Settings --}}
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-2">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-2" type="button" aria-expanded="false">
                                        <h2>{{ __('Website Configuration Settings') }}</h2>
                                    </button>
                                </h2>
                                <div class="accordion-collapse collapse" id="collapse-2"
                                    data-bs-parent="#accordion-example">
                                    <div class="accordion-body pt-0">
                                        <form action="{{ route('admin.change.website.settings') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">

                                                {{-- Theme Colors --}}
                                                <div class="col-md-12 col-xl-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('Theme Colors') }}</label>
                                                        <div class="row g-2">

                                                            <div class="col-auto">
                                                                <label class="form-colorinput">
                                                                    <input class="form-colorinput-input" name="app_theme"
                                                                        type="radio" value="blue"
                                                                        {{ $config[11]->config_value == 'blue' ? 'checked' : '' }} />
                                                                    <span class="form-colorinput-color bg-blue"></span>
                                                                </label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <label class="form-colorinput form-colorinput-light">
                                                                    <input class="form-colorinput-input" name="app_theme"
                                                                        type="radio" value="indigo"
                                                                        {{ $config[11]->config_value == 'indigo' ? 'checked' : '' }} />
                                                                    <span class="form-colorinput-color bg-indigo"></span>
                                                                </label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <label class="form-colorinput">
                                                                    <input class="form-colorinput-input" name="app_theme"
                                                                        type="radio" value="green"
                                                                        {{ $config[11]->config_value == 'green' ? 'checked' : '' }} />
                                                                    <span class="form-colorinput-color bg-green"></span>
                                                                </label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <label class="form-colorinput">
                                                                    <input class="form-colorinput-input" name="app_theme"
                                                                        type="radio" value="yellow"
                                                                        {{ $config[11]->config_value == 'yellow' ? 'checked' : '' }} />
                                                                    <span class="form-colorinput-color bg-yellow"></span>
                                                                </label>
                                                            </div>

                                                            <div class="col-auto">
                                                                <label class="form-colorinput">
                                                                    <input class="form-colorinput-input" name="app_theme"
                                                                        type="radio" value="red"
                                                                        {{ $config[11]->config_value == 'red' ? 'checked' : '' }} />
                                                                    <span class="form-colorinput-color bg-red"></span>
                                                                </label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <label class="form-colorinput">
                                                                    <input class="form-colorinput-input" name="app_theme"
                                                                        type="radio" value="purple"
                                                                        {{ $config[11]->config_value == 'purple' ? 'checked' : '' }} />
                                                                    <span class="form-colorinput-color bg-purple"></span>
                                                                </label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <label class="form-colorinput">
                                                                    <input class="form-colorinput-input" name="app_theme"
                                                                        type="radio" value="pink"
                                                                        {{ $config[11]->config_value == 'pink' ? 'checked' : '' }} />
                                                                    <span class="form-colorinput-color bg-pink"></span>
                                                                </label>
                                                            </div>
                                                            <div class="col-auto">
                                                                <label class="form-colorinput form-colorinput-light">
                                                                    <input class="form-colorinput-input" name="app_theme"
                                                                        type="radio" value="gray"
                                                                        {{ $config[11]->config_value == 'gray' ? 'checked' : '' }} />
                                                                    <span class="form-colorinput-color bg-muted"></span>
                                                                </label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Home Banner Image --}}
                                                <div class="col-md-4 col-xl-4">
                                                    <div class="mb-3">
                                                        <div class="form-label">{{ __('Banner Image') }}</div>
                                                        <input class="form-control" name="primary_image" type="file"
                                                            placeholder="{{ __('Banner Image') }}..."
                                                            accept=".png,.jpg,.jpeg,.gif,.svg" />
                                                        <small class="text-muted">
                                                            {{ __('Recommended size : 1000 x 667') }}</small>
                                                    </div>
                                                </div>

                                                {{-- Website Logo --}}
                                                <div class="col-md-4 col-xl-4">
                                                    <div class="mb-3">
                                                        <div class="form-label">{{ __('Website Logo') }}</div>
                                                        <input class="form-control" name="site_logo" type="file"
                                                            placeholder="{{ __('Website Logo') }}..."
                                                            accept=".png,.jpg,.jpeg,.gif,.svg" />
                                                        <small class="text-muted">
                                                            {{ __('Recommended size : 200 x 90') }}</small>
                                                    </div>
                                                </div>

                                                {{-- Favicon --}}
                                                <div class="col-md-4 col-xl-4">
                                                    <div class="mb-3">
                                                        <div class="form-label">{{ __('Favicon') }}</div>
                                                        <input class="form-control" name="favi_icon" type="file"
                                                            placeholder="{{ __('Favicon') }}..."
                                                            accept=".png,.jpg,.jpeg,.gif,.svg" />
                                                        <small class="text-muted">
                                                            {{ __('Recommended size : 200 x 200') }}</small>
                                                    </div>
                                                </div>

                                                {{-- App Name --}}
                                                <div class="col-md-6 col-xl-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('App Name') }}</label>
                                                        <input class="form-control" name="app_name" type="text"
                                                            value="{{ config('app.name') }}"
                                                            placeholder="{{ __('App Name') }}..." readonly>
                                                    </div>
                                                </div>

                                                {{-- Site Name --}}
                                                <div class="col-md-6 col-xl-6">
                                                    <div class="mb-3">
                                                        <label class="form-label required">{{ __('Site Name') }}</label>
                                                        <input class="form-control" name="site_name" type="text"
                                                            value="{{ $settings->site_name }}"
                                                            placeholder="{{ __('Site Name') }}..." required>
                                                    </div>
                                                </div>

                                                {{-- SEO Meta Description --}}
                                                <div class="col-md-6 col-xl-6">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('SEO Meta Description') }}</label>
                                                        <textarea class="form-control" name="seo_meta_desc" rows="3" placeholder="{{ __('SEO Meta Description') }}"
                                                            required>{{ $settings->seo_meta_description }}</textarea>
                                                    </div>
                                                </div>

                                                {{-- SEO Keywords --}}
                                                <div class="col-md-6 col-xl-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('SEO Keywords') }}</label>
                                                        <textarea class="form-control required" name="meta_keywords" rows="3"
                                                            placeholder="{{ __('SEO Keywords (Keyword 1, Keyword 2)') }}" required>{{ $settings->seo_keywords }}</textarea>
                                                    </div>
                                                </div>

                                                {{-- Update button --}}
                                                <div class="text-end">
                                                    <div class="d-flex">
                                                        <button class="btn btn-primary btn-md ms-auto" type="submit">
                                                            {{ __('Update') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- Update Payments Settings --}}
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-3">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-3" type="button" aria-expanded="false">
                                        <h2>{{ __('Payment Methods Configuration Settings') }}</h2>
                                    </button>
                                </h2>
                                <div class="accordion-collapse collapse" id="collapse-3"
                                    data-bs-parent="#accordion-example">
                                    <div class="accordion-body pt-0">
                                        <form action="{{ route('admin.change.payments.settings') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">

                                                {{-- Paypal Settings --}}
                                                <h2 class="page-title my-3">
                                                    {{ __('Paypal Settings') }}
                                                </h2>
                                                {{-- Mode --}}
                                                <div class="col-md-4 col-xl-4">
                                                    <div class="mb-3">
                                                        <label class="form-label required">{{ __('Mode') }}</label>
                                                        <select class="form-select" id="select-tags-advanced"
                                                            name="paypal_mode" type="text"
                                                            placeholder="Select a payment mode" required>
                                                            <option value="sandbox"
                                                                {{ $config[3]->config_value == 'sandbox' ? 'selected' : '' }}>
                                                                {{ __('Sandbox') }}</option>
                                                            <option value="live"
                                                                {{ $config[3]->config_value == 'live' ? 'selected' : '' }}>
                                                                {{ __('Live') }}</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                {{-- Client Key --}}
                                                <div class="col-md-4 col-xl-4">
                                                    <div class="mb-3">
                                                        <label class="form-label required">{{ __('Client Key') }}</label>
                                                        <input class="form-control" name="paypal_client_key"
                                                            type="text" value="{{ $config[4]->config_value }}"
                                                            placeholder="{{ __('Client Key') }}..." required>
                                                    </div>
                                                </div>

                                                {{-- Secret --}}
                                                <div class="col-md-4 col-xl-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" required>{{ __('Secret') }}</label>
                                                        <input class="form-control" name="paypal_secret" type="text"
                                                            value="{{ $config[5]->config_value }}"
                                                            placeholder="{{ __('Secret') }}..." required>
                                                    </div>
                                                </div>

                                                {{-- Razorpay Settings --}}
                                                {{-- <h2 class="page-title my-3">
                                                    {{ __('Razorpay Settings') }}
                                                </h2> --}}
                                                {{-- Client Key --}}
                                                {{-- <div class="col-md-6 col-xl-6">
                                                    <div class="mb-3">
                                                        <label class="form-label required">{{ __('Client Key') }}</label>
                                                        <input type="text" class="form-control"
                                                            name="razorpay_client_key"
                                                            value="{{ $config[6]->config_value }}"
                                                            placeholder="{{ __('Client Key') }}..." required>
                                                    </div>
                                                </div> --}}

                                                {{-- Secret --}}
                                                {{-- <div class="col-md-6 col-xl-6">
                                                    <div class="mb-3">
                                                        <label class="form-label required">{{ __('Secret') }}</label>
                                                        <input type="text" class="form-control" name="razorpay_secret"
                                                            value="{{ $config[7]->config_value }}"
                                                            placeholder="{{ __('Secret') }}..." required>
                                                    </div>
                                                </div> --}}

                                                {{-- Stripe Settings --}}
                                                <h2 class="page-title my-3">
                                                    {{ __('Stripe Settings') }}
                                                </h2>
                                                {{-- Publishable Key --}}
                                                <div class="col-md-6 col-xl-6">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('Publishable Key') }}</label>
                                                        <input class="form-control" name="stripe_publishable_key"
                                                            type="text" value="{{ $config[9]->config_value }}"
                                                            placeholder="{{ __('Publishable Key') }}..." required>
                                                    </div>
                                                </div>

                                                {{-- Secret --}}
                                                <div class="col-md-6 col-xl-6">
                                                    <div class="mb-3">
                                                        <label class="form-label required">{{ __('Secret') }}</label>
                                                        <input class="form-control" name="stripe_secret" type="text"
                                                            value="{{ $config[10]->config_value }}"
                                                            placeholder="{{ __('Secret') }}..." required>
                                                    </div>
                                                </div>

                                                {{-- Offline (Bank Transfer) Settings --}}
                                                <div class="col-md-6 col-xl-6 mt-3">
                                                    <h2 class="page-title my-3">
                                                        {{ __('Offline (Bank Transfer) Settings') }}
                                                    </h2>
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('Offline (Bank Transfer) Details') }}</label>

                                                        <textarea class="form-control" name="bank_transfer" rows="3"
                                                            placeholder="{{ __('Offline (Bank Transfer) Details') }}" required>{{ $config[31]->config_value }}</textarea>
                                                    </div>
                                                </div>

                                                {{-- Update button --}}
                                                <div class="text-end">
                                                    <div class="d-flex">
                                                        <button class="btn btn-primary btn-md ms-auto" type="submit">
                                                            {{ __('Update') }}
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- Update Google Settings --}}
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-4">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-4" type="button" aria-expanded="false">
                                        <h2>{{ __('Webtools and Google Configuration Settings') }}</h2>
                                    </button>
                                </h2>
                                <div class="accordion-collapse collapse" id="collapse-4"
                                    data-bs-parent="#accordion-example">
                                    <div class="accordion-body pt-0">
                                        <form action="{{ route('admin.change.google.settings') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">

                                                {{-- Google reCAPTCHA Settings --}}
                                                <h2 class="page-title my-3">
                                                    {{ __('Google reCAPTCHA Configuration Settings') }}
                                                </h2>
                                                <div class="col-md-4 col-xl-4">
                                                    <div class="mb-3">
                                                        <div class="form-label">{{ __('reCAPTCHA Enable') }}</div>
                                                        <select class="form-select" id="recaptcha_enable"
                                                            name="recaptcha_enable"
                                                            placeholder="{{ __('Select a reCAPTCHA') }}" disabled="">
                                                            <option value="on"
                                                                {{ $settings->recaptcha_configuration['RECAPTCHA_ENABLE'] == 'on' ? 'checked' : '' }}>
                                                                {{ __('On') }}</option>
                                                            <option value="off"
                                                                {{ $settings->recaptcha_configuration['RECAPTCHA_ENABLE'] == 'off' ? 'checked' : '' }}>
                                                                {{ __('Off') }}</option>
                                                        </select>
                                                    </div>
                                                    <span>{{ __('If you did not get a reCAPTCHA (v2 Checkbox), create a') }}
                                                        <a href="https://www.google.com/recaptcha/about/"
                                                            target="_blank">{{ __('reCAPTCHA') }}</a> </span>
                                                </div>

                                                {{-- reCAPTCHA Site Key --}}
                                                <div class="col-md-4 col-xl-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('reCAPTCHA Site Key') }}</label>
                                                        <input class="form-control" name="recaptcha_site_key"
                                                            type="text"
                                                            value="{{ $settings->recaptcha_configuration['RECAPTCHA_SITE_KEY'] }}"
                                                            placeholder="{{ __('reCAPTCHA Site Key') }}..." readonly>
                                                    </div>
                                                </div>

                                                {{-- reCAPTCHA Secret Key --}}
                                                <div class="col-md-4 col-xl-4">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label">{{ __('reCAPTCHA Secret Key') }}</label>
                                                        <input class="form-control" name="recaptcha_secret_key"
                                                            type="text"
                                                            value="{{ $settings->recaptcha_configuration['RECAPTCHA_SECRET_KEY'] }}"
                                                            placeholder="{{ __('reCAPTCHA Secret Key') }}..." readonly>
                                                    </div>
                                                </div>

                                                {{-- Google OAuth Settings --}}
                                                <h2 class="page-title my-4">
                                                    {{ __('Google OAuth Configuration Settings') }}
                                                </h2>
                                                {{-- Google Auth Enable --}}
                                                <div class="col-md-3 col-xl-3">
                                                    <div class="mb-3">
                                                        <div class="form-label">{{ __('Google Auth Enable') }}</div>
                                                        <select class="form-select" id="google_auth_enable"
                                                            name="google_auth_enable"
                                                            placeholder="{{ __('Select a Google Auth Enable') }}"
                                                            disabled="">
                                                            <option value="on"
                                                                {{ $settings->google_configuration['GOOGLE_ENABLE'] == 'on' ? 'checked' : '' }}>
                                                                {{ __('On') }}</option>
                                                            <option value="off"
                                                                {{ $settings->google_configuration['GOOGLE_ENABLE'] == 'off' ? 'checked' : '' }}>
                                                                {{ __('Off') }}</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                {{-- Google Client ID --}}
                                                <div class="col-md-3 col-xl-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('Google Client ID') }}</label>
                                                        <input class="form-control" name="google_client_id"
                                                            type="text"
                                                            value="{{ $settings->google_configuration['GOOGLE_CLIENT_ID'] }}"
                                                            placeholder="{{ __('Google CLIENT ID') }}..." readonly>
                                                    </div>
                                                </div>

                                                {{-- Google Client Secret --}}
                                                <div class="col-md-3 col-xl-3">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label">{{ __('Google Client Secret') }}</label>
                                                        <input class="form-control" name="google_client_secret"
                                                            type="text"
                                                            value="{{ $settings->google_configuration['GOOGLE_CLIENT_SECRET'] }}"
                                                            placeholder="{{ __('Google CLIENT Secret') }}..." readonly>
                                                    </div>
                                                </div>

                                                {{-- Google Redirect --}}
                                                <div class="col-md-3 col-xl-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('Google Redirect') }}</label>
                                                        <input class="form-control" name="google_redirect" type="text"
                                                            value="{{ $settings->google_configuration['GOOGLE_REDIRECT'] }}"
                                                            placeholder="{{ __('Google Redirect') }}..." readonly>
                                                    </div>
                                                </div>
                                                <span>{{ __('If you did not get a google OAuth Client ID & Secret Key, follow a') }}
                                                    <a href="https://support.google.com/cloud/answer/6158849?hl=en#zippy=%2Cuser-consent%2Cpublic-and-internal-applications%2Cauthorized-domains/"
                                                        target="_blank">{{ __(' steps') }}</a> </span>

                                                {{-- Google Analytics ID --}}
                                                <div class="col-md-12 col-xl-12 mt-3">
                                                    <h2 class="page-title my-3">
                                                        {{ __('Google Analytics Configuration Settings') }}
                                                    </h2>
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('Google Analytics ID') }}</label>
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text">
                                                                {{ __('https://www.googletagmanager.com/gtag/js?id=') }}
                                                            </span>
                                                            <input class="form-control " name="google_analytics_id"
                                                                type="text"
                                                                value="{{ $settings->google_analytics_id }}"
                                                                placeholder="{{ __('Google Analytics ID') }}"
                                                                autocomplete="off">

                                                        </div>
                                                    </div>
                                                    <span>{{ __('If you did not get a google analytics id, create a') }}
                                                        <a href="https://analytics.google.com/analytics/web/"
                                                            target="_blank">{{ __('new analytics id.') }}</a> </span>
                                                </div>

                                                {{-- Webtools and Google AdSense --}}
                                                <div class="col-md-12 col-xl-12 mt-3">
                                                    <h2 class="page-title my-3">
                                                        {{ __('Webtools and Google AdSense Configuration Settings') }}
                                                    </h2>
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('Google AdSense code') }}</label>
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text">
                                                                {{ __('https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=') }}
                                                            </span>
                                                            <input class="form-control " name="google_adsense_code"
                                                                type="text"
                                                                value="{{ $settings->google_adsense_code }}"
                                                                placeholder="{{ __('Google AdSense code') }}..."
                                                                autocomplete="off">
                                                        </div>
                                                        <small>{{ __('Note') }} :</small><br>
                                                        <small>{{ __('Type DISABLE_ADSENSE_ONLY for enable webtools without AdSense') }}</small><br>
                                                        <small>{{ __('Enter your AdSense code for enable webtools with AdSense') }}</small><br>
                                                        <small>{{ __('Type DISABLE_BOTH for disable webtools & AdSense') }}</small><br>
                                                    </div>
                                                    <span>{{ __('If you did not get a google adsense code, create a') }}
                                                        <a href="https://www.google.com/adsense/new"
                                                            target="_blank">{{ __('new adsense code.') }}</a> </span>
                                                </div>

                                                {{-- Update button --}}
                                                <div class="text-end">
                                                    <div class="d-flex">
                                                        <button class="btn btn-primary btn-md ms-auto" type="submit">
                                                            {{ __('Update') }}
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- Update Email Configuration Settings --}}
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-5">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-5" type="button" aria-expanded="false">
                                        <h2>{{ __('Email Configuration Settings') }}</h2>
                                    </button>
                                </h2>
                                <div class="accordion-collapse collapse" id="collapse-5"
                                    data-bs-parent="#accordion-example">
                                    <div class="accordion-body pt-0">
                                        <form action="{{ route('admin.change.email.settings') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">

                                                {{-- Sender Name --}}
                                                <div class="col-md-4 col-xl-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('Sender Name') }}</label>
                                                        <input class="form-control" name="mail_sender" type="text"
                                                            value="{{ $settings->email_configuration['name'] }}"
                                                            placeholder="{{ __('Sender Name') }}..." readonly>
                                                    </div>
                                                </div>

                                                {{-- Sender Email Address --}}
                                                <div class="col-md-4 col-xl-4">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label">{{ __('Sender Email Address') }}</label>
                                                        <input class="form-control" name="mail_address" type="text"
                                                            value="{{ $settings->email_configuration['address'] }}"
                                                            placeholder="{{ __('Sender Email Address') }}..." readonly>
                                                    </div>
                                                </div>

                                                {{-- Mailer Driver --}}
                                                <div class="col-md-4 col-xl-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('Mailer Driver') }}</label>
                                                        <input class="form-control" name="mail_driver" type="text"
                                                            value="{{ $settings->email_configuration['driver'] }}"
                                                            placeholder="{{ __('Mailer Driver') }}..." readonly>
                                                    </div>
                                                </div>

                                                {{-- Mailer Host --}}
                                                <div class="col-md-4 col-xl-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('Mailer Host') }}</label>
                                                        <input class="form-control" name="mail_host" type="text"
                                                            value="{{ $settings->email_configuration['host'] }}"
                                                            placeholder="{{ __('Mailer Host') }}..." readonly>
                                                    </div>
                                                </div>

                                                {{-- Mailer Port --}}
                                                <div class="col-md-4 col-xl-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('Mailer Port') }}</label>
                                                        <input class="form-control" name="mail_port" type="text"
                                                            value="{{ $settings->email_configuration['port'] }}"
                                                            placeholder="{{ __('Mailer Port') }}..." readonly>
                                                    </div>
                                                </div>

                                                {{-- Mailer Encryption --}}
                                                <div class="col-md-4 col-xl-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('Mailer Encryption') }}</label>
                                                        <input class="form-control" name="mail_encryption" type="text"
                                                            value="{{ $settings->email_configuration['encryption'] }}"
                                                            placeholder="{{ __('Mailer Encryption') }}..." readonly>
                                                    </div>
                                                </div>

                                                {{-- Mailer Username --}}
                                                <div class="col-md-4 col-xl-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('Mailer Username') }}</label>
                                                        <input class="form-control" name="mail_username" type="text"
                                                            value="{{ $settings->email_configuration['username'] }}"
                                                            placeholder="{{ __('Mailer Username') }}..." readonly>
                                                    </div>
                                                </div>

                                                {{-- Mailer Password --}}
                                                <div class="col-md-4 col-xl-4">
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('Mailer Password') }}</label>
                                                        <input class="form-control" name="mail_password" type="password"
                                                            value="{{ $settings->email_configuration['password'] }}"
                                                            placeholder="{{ __('Mailer Password') }}..." readonly>
                                                    </div>
                                                </div>

                                                {{-- Test Mail --}}
                                                <div class="col-md-4 col-xl-4 mt-3">
                                                    <div class="mb-3">
                                                        <label class="form-label"></label>
                                                        <a class="btn btn-primary"
                                                            href="{{ route('admin.test.email') }}">
                                                            {{ __('Test Mail') }}
                                                        </a>
                                                    </div>
                                                </div>

                                                {{-- Update button --}}
                                                <div class="text-end">
                                                    <div class="d-flex">
                                                        <button class="btn btn-primary btn-md ms-auto" type="submit">
                                                            {{ __('Update') }}
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Footer --}}
        @include('admin.includes.footer')
    </div>
@endsection
