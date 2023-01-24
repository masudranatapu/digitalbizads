@extends('layouts.admin', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])

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
                        {{ __('Add Payment Method') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-sm-12 col-lg-12">
                    <form action="{{ route('admin.save.payment.method') }}" method="post" enctype="multipart/form-data"
                        class="card">
                        @csrf
                        <div class="card-header">
                            <h4 class="page-title">{{ __('Payment Method Details') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-10">
                                    <div class="row">
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Thumb Image') }}</div>
                                                <input type="file" class="form-control" name="payment_gateway_logo"
                                                    placeholder="{{ __('Thumb Image') }}..." required />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label
                                                    class="form-label required">{{ __('Payment Method Name') }}</label>
                                                <input type="text" class="form-control" name="payment_gateway_name"
                                                    placeholder="{{ __('Payment Method') }}..." required>
                                            </div>
                                        </div>
                                        <h2 class="page-title my-3">
                                            {{ __('Payment Settings') }}
                                        </h2>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Client ID') }} <span
                                                        class="text-muted">({{ __('Set 0 to disable it') }})</span></label>
                                                <input type="text" class="form-control" name="client_id"
                                                    placeholder="{{ __('Client ID') }}..." required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Secret Key') }} <span
                                                        class="text-muted">({{ __('Set 0 to disable it') }})</span></label>
                                                <input type="text" class="form-control" name="secret_key"
                                                    placeholder="{{ __('Secret Key') }}..." required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xl-4 my-3">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-plus" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                                    </svg>
                                                    {{ __('Add') }}
                                                </button>
                                            </div>
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
    @include('admin.includes.footer')
</div>
@endsection
