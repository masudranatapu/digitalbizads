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
                        {{ __('Offline Checkout') }}
                    </h2>
                    <small class="text-muted mt-2 mb-2">{{ __('Note: Do Page Refresh or back button.') }}</small>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xl mt-3">
        <div class="row row-deck row-cards">
            <div class="col-sm-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('mark.payment.payment') }}" method="post">
                            @csrf
                            <h3 class="card-title">{{ __('Plan Name : ')}}{{ $plan_details->plan_name }}</h3>
                            <input type="hidden" value="{{ $plan_details->plan_id }}" name="plan_id">
                            <div class="col-md-10 col-xl-10">
                                <div class="mb-3">
                                    <label class="form-label required">{{ __('Transaction ID') }}</label>
                                    <input type="text" class="form-control" name="transaction_id"
                                        placeholder="{{ __('Transaction ID') }}..." required>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-6 my-3">
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">{{ __('Verify Payment') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ __('Bank Details') }}</h3>
                        <pre>{{ $config[31]->config_value }}</pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('user.includes.footer')
</div>
@endsection
