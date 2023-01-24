@extends('layouts.admin', ['header' => true, 'nav' => true, 'demo' => true])

@section('content')
<div class="page-wrapper">
    <div class="container-xl mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Transactions') }}</h3>
                </div>
                <div class="table-responsive px-2 py-2">
                    <table class="table card-table table-vcenter text-nowrap datatable" id="table">
                        <thead>
                            <tr>
                                <th>{{ __('Transaction Date') }}</th>
                                <th class="w-1">{{ __('Trans ID') }}</th>
                                <th>{{ __('Payment Trans ID') }}</th>
                                <th>{{ __('Customer Name') }}</th>
                                <th>{{ __('Gateway Name') }}</th>
                                <th>{{ __('Amount') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($transactions) && $transactions->count())
                            @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->created_at->format('d-m-Y H:i:s A') }}</td>
                                <td><span class="text-muted">{{ $transaction->gobiz_transaction_id}}</span></td>
                                <td>{{ $transaction->transaction_id }}</td>
                                @if ($transaction->userId == "#")
                                <td><a href="#">{{ __($transaction->name) }}</a></td>
                                @else
                                <td><a href="{{ route('admin.view.user', $transaction->userId)}}">{{ __($transaction->name) }}</a></td>
                                @endif
                                <td>
                                    {{ __($transaction->payment_gateway_name) }}
                                </td>
                                <td>
                                    @foreach ($currencies as $currency)
                                    @if ($transaction->transaction_currency == $currency->iso_code)
                                    {{ $currency->symbol }}{{ $transaction->transaction_amount }}
                                    @endif
                                    @endforeach
                                </td>
                                <td>
                                    @if ($transaction->payment_status == 'SUCCESS')
                                    <span class="badge bg-green">{{ __('Paid') }}</span>
                                    @endif
                                    @if ($transaction->payment_status == 'FAILED')
                                    <span class="badge bg-red">{{ __('Failed') }}</span>
                                    @endif
                                    @if ($transaction->payment_status == 'PENDING')
                                    <span class="badge bg-orange">{{ __('Pending') }}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-list flex-nowrap">

                                        @if ($transaction->payment_status == "SUCCESS")
                                        <a class="btn btn-primary btn-sm" target="_blank"
                                        href="{{ route('admin.view.invoice', ['id' => $transaction->gobiz_transaction_id])}}">{{ __('Invoice') }}</a>
                                        @endif

                                        @if ($transaction->payment_status != "PENDING")
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.trans.status', ['id' => $transaction->gobiz_transaction_id, 'status' => 'PENDING'])}}">{{ __('Pending') }}</a>
                                        @endif
                                        @if ($transaction->payment_status != "SUCCESS")
                                        <a class="btn btn-primary btn-sm" href="#"
                                            onclick="getTransaction('{{ $transaction->gobiz_transaction_id }}'); return false;">{{ __('Success') }}</a>
                                        @endif
                                        @if ($transaction->payment_status != "FAILED")
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.trans.status', ['id' => $transaction->gobiz_transaction_id, 'status' => 'FAILED'])}}">{{ __('Failed') }}</a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr class="text-center font-weight-bold">
                                <td colspan="7">{{ __('No Transactions Found.') }}</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
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
                <div>{{ __('If you proceed with this transaction, you will have payment status success this plan.')}}</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary me-auto"
                    data-bs-dismiss="modal">{{ __('Cancel')}}</button>
                <a class="btn btn-danger" id="transaction_id">{{ __('Yes, proceed')}}</a>
            </div>
        </div>
    </div>
</div>
@endsection
