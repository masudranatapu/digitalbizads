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
                        {{ __('Payment Methods') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="table-responsive px-2 py-2">
                            <table class="table table-vcenter card-table" id="table">
                                <thead>
                                    <tr>
                                        <th>{{ __('Payment Method') }}</th>
                                        <th>{{ __('Installed') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th class="w-1">{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($payment_methods) != 0)
                                    @foreach ($payment_methods as $payment_method)
                                    <tr>
                                        <td>
                                            <div class="d-flex py-1 align-items-center">
                                                <span class="avatar me-2"
                                                    style="background-image: url({{ url('/') }}{{ $payment_method->payment_gateway_logo }})"></span>
                                                <div class="flex-fill">
                                                    <div class="font-weight-medium">
                                                        {{ __($payment_method->payment_gateway_name) }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-muted">
                                            @if ($payment_method->is_status == 'disabled')
                                            {{ __('Not Installed Yet' )}}
                                            @else
                                            {{ __('Installed' )}}
                                            @endif
                                        </td>
                                        <td class="text-muted">
                                            @if ($payment_method->status == 0)
                                            <span class="badge bg-red">{{ __('Inactive') }}</span>
                                            @else
                                            <span class="badge bg-green">{{ __('Active') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                @if ($payment_method->status == 0)
                                                <a class="btn btn-primary btn-sm" href="#"
                                                    onclick="getPaymentMethod('{{ $payment_method->payment_gateway_id }}'); return false;">{{ __('Activate') }}</a>
                                                @else
                                                <a class="btn btn-primary btn-sm" href="#"
                                                    onclick="getPaymentMethod('{{ $payment_method->payment_gateway_id }}'); return false;">{{ __('Deactivate') }}</a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <td class="text-center font-weight-bold" colspan="6">
                                        {{ __('NO PAYMENT METHODS FOUND') }}
                                    </td>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.includes.footer')
</div>

<div class="modal modal-blur fade" id="delete-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">{{ __('Are you sure?')}}</div>
                <div>{{ __('If you proceed, you will active/deactivate this payment method data.')}}</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary me-auto"
                    data-bs-dismiss="modal">{{ __('Cancel')}}</button>
                <a class="btn btn-danger" id="payment_gateway_id">{{ __('Yes, proceed')}}</a>
            </div>
        </div>
    </div>
</div>
@endsection
