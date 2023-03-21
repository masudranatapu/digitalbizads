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
                                            <th>{{ __('User Name') }}</th>
                                            <th>{{ __('Area Name') }}</th>
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
                                                    <td>
                                                        {{ '$' . $value->amount }}
                                                    </td>
                                                    <td>
                                                        @if ($value->status == 1)
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
                                                                data-url="{{ route('user.shipping_area.delete', $value->id) }}"
                                                                href="javascript:;" onclick="deleteShippingArea(this)">
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
                    {{-- mobile  --}}
                    @if (!empty($shippingarea) && $shippingarea->count() > 0)
                        <div
                            class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-block d-sm-block d-md-none d-lg-none d-xl-none">
                            <div class="row">
                                @foreach ($shippingarea as $row)
                                    <div class="">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                                                        <h3 class="text-left">
                                                            <td>{{ $row->name }} ( {{ '$' . $row->amount }} )</td>
                                                        </h3>
                                                    </div>

                                                    <div class="col-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
                                                        <div class="dropdown text-end">
                                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                Actions
                                                            </button>
                                                            <div class="dropdown-menu" style="">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('user.shipping_area.edit', $row->id) }}">
                                                                    {{ __('Edit') }}
                                                                </a>
                                                                <a class="dropdown-item"
                                                                    data-url="{{ route('user.shipping_area.delete', $row->id) }}"
                                                                    href="javascript:;" onclick="deleteShippingArea(this)">
                                                                    {{ __('Delete') }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                @endforeach
                            </div>

                        </div>
                    @endif
                </div>
            </div>
        </div>
        @include('user.includes.footer')
    </div>

    <div class="modal modal-blur fade" id="deleteShippingArea" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-title">{{ __('Are you sure?') }}</div>
                    <div id="statusMessage"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary me-auto"
                        data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <a class="btn btn-danger" id="deleteproceeing">{{ __('Yes, proceed') }}</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('custom-js')
    <script>
        function deleteShippingArea(event) {

            const {
                url
            } = event.dataset;

            // console.log(url);
            $('#deleteShippingArea').modal('show');
            $('#deleteproceeing').prop('href', url);
        }
    </script>
@endpush
