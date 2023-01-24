@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])

@section('css')
<script src="{{ asset('js/html2pdf.bundle.min.js')}}"></script>
<script>
    function generatePDF() {
        const element = document.getElementById('invoice');
        html2pdf()
		.set({ filename: `{{ $transaction->invoice_prefix }}{{ $transaction->invoice_number }}`+'.pdf', html2canvas: { scale: 4 } })
		.from(element)
		.save();
    }
</script>
@endsection

@section('content')
<div class="page-wrapper">
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        {{ __('Invoice') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <button onclick="generatePDF()" class="btn btn-primary" onclick="javascript:window.print();">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                            <polyline points="7 11 12 16 17 11" />
                            <line x1="12" y1="4" x2="12" y2="16" />
                        </svg>
                        {{ __('Download') }}
                    </button>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                            <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                            <rect x="7" y="13" width="10" height="8" rx="2" />
                        </svg>
                        {{ __('Print') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="card card-lg">
                <div class="p-5" id="invoice">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <p class="h3">{{ __($transaction->billing_details['from_billing_name']) }}</p>
                                <address>
                                    {{ __($transaction->billing_details['from_billing_name']) }}<br>
                                    {{ __($transaction->billing_details['from_billing_address'] == null ? __('Not Available') :
                                    $transaction->billing_details['from_billing_address']) }}<br>
                                    {{ __($transaction->billing_details['from_billing_state'] == null ? __('Not Available') :
                                    $transaction->billing_details['from_billing_state']) }},
                                    {{ __($transaction->billing_details['from_billing_city'] == null ? __('Not Available') :
                                    $transaction->billing_details['from_billing_city']) }}<br>
                                    {{ __($transaction->billing_details['from_billing_country'] == null ? __('Not Available') :
                                    $transaction->billing_details['from_billing_country']) }},
                                    {{ __($transaction->billing_details['from_billing_zipcode'] == null ? __('Not Available') :
                                    $transaction->billing_details['from_billing_zipcode']) }}<br>
                                    {{ __($transaction->billing_details['from_billing_email'] == null ? __('Not Available') :
                                    $transaction->billing_details['from_billing_email']) }}

                                    <br>
                                    {{ __($transaction->billing_details['from_billing_phone'] == null ? __('Not Available') :
                                    $transaction->billing_details['from_billing_phone']) }}
                                    <br>
                                    <br>
                                    @if ($transaction->billing_details['from_vat_number'] != null)
                                    <p>{{ __('Tax Number:') }}
                                        {{ __($transaction->billing_details['from_vat_number']) }}</p>
                                    @endif
                                </address>
                            </div>
                            <div class="col-6 text-end">
                                <p class="h3">{{ __($transaction->billing_details['to_billing_name']) }}</p>
                                <address>
                                    {{ __($transaction->billing_details['to_billing_address'] == null ? __('Not Available') :
                                    $transaction->billing_details['to_billing_address']) }}<br>
                                    {{ __($transaction->billing_details['to_billing_state'] == null ? __('Not Available') :
                                    $transaction->billing_details['to_billing_state']) }},
                                    {{ __($transaction->billing_details['to_billing_city'] == null ? __('Not Available') :
                                    $transaction->billing_details['to_billing_city']) }}<br>
                                    {{ __($transaction->billing_details['to_billing_country'] == null ? __('Not Available') :
                                    $transaction->billing_details['to_billing_country']) }},
                                    {{ __($transaction->billing_details['to_billing_zipcode'] == null ? __('Not Available') :
                                    $transaction->billing_details['to_billing_zipcode']) }}<br>
                                    {{ __($transaction->billing_details['to_billing_email'] == null ? __('Not Available') :
                                    $transaction->billing_details['to_billing_email']) }}
                                    <br>
                                    {{ __($transaction->billing_details['to_billing_phone'] == null ? __('Not Available') :
                                    $transaction->billing_details['to_billing_phone']) }}
                                    <br>
                                    @if ($transaction->billing_details['to_vat_number'] != null)
                                    <p>{{ __('Tax Number:') }}
                                        {{ __($transaction->billing_details['to_vat_number']) }}</p>
                                    @endif
                                </address>
                                <h4>{{ __('INVOICE DATE') }} : 
                                    {{ date('d-m-Y h:i A', strtotime($transaction->transaction_date)) }}</h4>
                            </div>
                            @if ($transaction->invoice_number > 0)
                            <div class="row">
                                <div class="col-10 my-5">
                                    <h1>{{ __('INVOICE NO') }} :
                                        {{ __($transaction->invoice_prefix) }}{{ $transaction->invoice_number }}</h1>
                                </div>
                                <div class="col-2">
                                    <img src="{{ asset('frontend/assets/elements/paid.png') }}"
                                        class="img-responsive p-3">
                                </div>
                            </div>
                            @endif

                        </div>
                        <table class="table table-transparent table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 1%"></th>
                                    <th>{{ __('Description') }}</th>
                                    <th class="text-center" style="width: 1%"></th>
                                    <th class="text-end" style="width: 1%"></th>
                                    <th class="text-end" style="width: 1%">{{ __('Amount') }}</th>
                                </tr>
                            </thead>
                            <tr>
                                <td class="text-center">1</td>
                                <td>
                                    <p class="strong mb-1">{{ __('Extended') }} : {{ __($transaction->desciption) }}</p>
                                    <div class="text-muted">{{ __('Via') }} :
                                        {{ __($transaction->payment_gateway_name) }}</div>
                                </td>
                                <td class="text-center"></td>
                                <td class="text-end"></td>
                                <td class="text-end">
                                    @foreach ($currencies as $currency)
                                    @if ($transaction->transaction_currency == $currency->iso_code)
                                    {{ $currency->symbol }} {{ number_format($transaction->billing_details['subtotal'], 2) }}
                                    @endif
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="strong text-end">{{ __('Subtotal') }}</td>
                                <td class="text-end">
                                    @foreach ($currencies as $currency)
                                    @if ($transaction->transaction_currency == $currency->iso_code)
                                    {{ $currency->symbol }} {{ number_format($transaction->billing_details['subtotal'], 2) }}
                                    @endif
                                    @endforeach
                                </td>
                            </tr>

                            @if ($transaction->billing_details['tax_amount'] > 0)
                            <tr>
                                <td colspan="4" class="strong text-end">

                                    {{ __($transaction->billing_details['tax_name']) }} {{ __('Rate') }}

                                    ({{ $transaction->billing_details['tax_value'] }}%)

                                </td>

                                <td class="text-end">
                                    @foreach ($currencies as $currency)
                                    @if ($transaction->transaction_currency == $currency->iso_code)
                                    {{ $currency->symbol }}{{
                                    number_format($transaction->billing_details['tax_amount'], 2) }}
                                    @endif
                                    @endforeach
                                </td>

                            </tr>
                            @endif


                            <tr>
                                <td colspan="4" class="font-weight-bold text-uppercase text-end">{{ __('Total') }}</td>
                                <td class="font-weight-bold text-end">
                                    @foreach ($currencies as $currency)
                                    @if ($transaction->transaction_currency == $currency->iso_code)
                                    {{ $currency->symbol }}{{ $transaction->billing_details['invoice_amount'] }}
                                    @endif
                                    @endforeach
                                </td>

                            </tr>
                        </table>
                        <p class="text-muted text-center mt-5">
                            {{ __($config[29]->config_value) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @include('user.includes.footer')
    </div>
    @endsection
