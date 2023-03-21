@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])

@section('content')
    <div class="page-wrapper">
        <div class="container-xl">
            <div class="page-header d-print-none">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="page-pretitle">
                            {{ __('Overview') }}
                        </div>
                        <h2 class="page-title">
                            {{ __('Shipping Area') }}
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="dropdown">
                            <a type="button" href="{{ route('user.shipping_area.create') }}">
                                <button type="button" class="btn btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                    {{ __('Create') }}
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <div class="col-sm-12 col-lg-12 d-none d-md-block">
                        <div class="card">
                            <div class="table-responsive px-2 py-2">
                                <table class="table table-vcenter card-table" id="table">
                                    <thead>
                                        <tr>
                                            <th>{{ __('S.No') }}</th>
                                            <th>{{ __('User Id') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Price') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th class="w-1">{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($shippingarea) && $shippingarea->count() > 0)
                                            @foreach ($shippingarea as $value)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $value->user->name ?? Auth::user()->name }}</td>
                                                    <td>{{ $value->name }}</td>
                                                    <td>{{ $value->amount }}</td>
                                                    <td>
                                                        @if($value->status == 1)
                                                            <span class="badge bg-success">Active</span>
                                                        @else
                                                            <span class="badge bg-info">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="btn-list flex-nowrap">
                                                            <a class="btn btn-secondary btn-sm"
                                                                href="{{ route('user.shipping_area.edit', $value->id) }}">
                                                                {{ __('Edit') }}
                                                            </a>
                                                            <a class="btn btn-danger btn-sm delete-card"
                                                                href="{{ route('user.shipping_area.delete', $value->id) }}">
                                                                {{ __('Delete') }}
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="font-weight-bold">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>{{ __('No DigitalBizAds Shipping area found') }}</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('user.includes.footer')
    </div>
@endsection
