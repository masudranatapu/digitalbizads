@extends('layouts.admin', ['header' => true, 'nav' => true, 'demo' => true])

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
                        {{ __('Edit Payment Method') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-sm-12 col-lg-12">
                    <form action="{{ route('admin.update.payment.method') }}" method="post"
                        enctype="multipart/form-data" class="card">
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
                                                <label class="form-label required">{{ __('Payment Method ID') }}</label>
                                                <input type="text" class="form-control" name="payment_gateway_id"
                                                    placeholder="{{ __('Payment Method ID') }}..."
                                                    value="{{ $gateway_details->payment_gateway_id }}" required
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label
                                                    class="form-label required">{{ __('Payment Method Name') }}</label>
                                                <input type="text" class="form-control" name="payment_gateway_name"
                                                    placeholder="{{ __('Payment Method') }}..."
                                                    value="{{ $gateway_details->payment_gateway_name }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Installed Status') }}</label>
                                                <div class="divide-y">
                                                    <div>
                                                        <label class="row">
                                                            <span class="col">{{ __('Status') }}</span>
                                                            <span class="col-auto">
                                                                <label class="form-check form-check-single form-switch">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="is_status"
                                                                        {{ $gateway_details->is_status == 'enabled' ? 'checked' : '' }}>
                                                                </label>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('admin.includes.footer')
</div>
@endsection
