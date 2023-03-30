@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])
@section('store-nav', 'active')

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
                            {{ __('Product Order') }}
                        </h2>
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
                                            <th style="width: 10%">{{ __('S.No') }}</th>
                                            <th>{{ __('User Name') }}</th>
                                            <th>{{ __('Transection Number') }}</th>
                                            <th>{{ __('Payment Amount') }}</th>
                                            <th>{{ __('Currency') }}</th>
                                            <th>{{ __('Order Date') }}</th>
                                            <th>{{ __('Payment Status') }}</th>
                                            <th class="w-1">{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($orders) && count($orders) > 0)
                                            @foreach ($orders as $order)
                                                @php
                                                    
                                                    $shippinfDetails = json_decode($order->shipping_details, true);
                                                @endphp
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $shippinfDetails['ship_first_name'] . ' ' . $shippinfDetails['ship_last_name'] }}
                                                    </td>
                                                    <td>{{ $order->hasTransection->transection_id }}</td>
                                                    <td>{{ getPrice($order->grand_total) }}</td>
                                                    <td class="text-uppercase">{{ $order->hasTransection->currency }}</td>
                                                    <td>{{ date('d-M-Y', strtotime($order->order_date)) }}</td>
                                                    <td>
                                                        @if ($order->payment_status)
                                                            <span class="badge bg-green">Success</span>
                                                        @else
                                                            <span class="badge bg-danger">Fail</span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <div class="btn-list flex-nowrap">
                                                            <a class="btn btn-primary btn-sm"
                                                                href="{{ route('user.order.view', ['card_id' => $card_id, 'id' => $order->id]) }}">{{ __('View') }}</a>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="font-weight-bold">

                                                <td class="text-center" colspan="8">
                                                    {{ __('No Product Variant Found.') }}</td>

                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    @if (isset($orders))
                        <div
                            class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-block d-sm-block d-md-none d-lg-none d-xl-none">
                            <div class="row">

                                @foreach ($orders as $row)
                                    <div class="">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
                                                        <h3 class="text-left">
                                                            <td>
                                                                {{ $shippinfDetails['ship_first_name'] . ' ' . $shippinfDetails['ship_last_name'] }}
                                                                <p class="m-0">({{ getPrice($order->total_price) }})</p>
                                                                @if ($order->payment_status)
                                                                    <p> Payment status: <span
                                                                            class="text-success">Success</span></p>
                                                                @else
                                                                    <p> Payment status: <span
                                                                            class="text-danger">Fail</span></p>
                                                                @endif
                                                            </td>

                                                        </h3>
                                                    </div>

                                                    <div class="col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                                                        <div class="dropdown text-end">
                                                            <button class="btn btn-primary dropdown-toggle"
                                                                data-bs-toggle="dropdown" type="button"
                                                                aria-expanded="false">
                                                                Actions
                                                            </button>
                                                            <div class="dropdown-menu" style="">

                                                                <a class="dropdown-item text-info"
                                                                    href="{{ route('user.order.view', ['card_id' => $card_id, 'id' => $order->id]) }}">{{ __('View') }}</a>

                                                            </div>
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
    {{--   <div class="modal fade" data-bs-backdrop="static" id="variantCreate" tabindex="-1" aria-labelledby="variantCreateLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>

                <form action="{{ route('user.product.variants.store', ['product_id' => $product_id]) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <h5 class="modal-title" id="variantCreateLabel">Variant</h5>
                        <div class="form-group">
                            <label for="name" class=" form-label required">{{ __('Variant Name') }}</label>
                            <input type="text" name="variant_name"
                                class="form-control @error('name') border-danger @enderror" placeholder="Variant Name"
                                required>
                            @error('variant_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" data-bs-backdrop="static" id="variantEdit" tabindex="-1"
        aria-labelledby="variantEditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>

                <form id="editForm" action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        <h5 class="modal-title" id="variantEditLabel">Variant Edit</h5>
                        <div class="form-group">
                            <label for="name" class=" form-label required">{{ __('Variant Name') }}</label>

                            <input type="text" name="variant_name" id="variant_edit" value=""
                                class="form-control @error('variant_name') border-danger @enderror"
                                placeholder="Variant Name" required>
                            @error('variant_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
     <div class="modal modal-blur fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-title">{{ __('Are you sure?') }}</div>
                    <div>{{ __('If you proceed, you will delete this variant.') }}</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary me-auto"
                        data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <a class="btn btn-danger" id="variant_id">{{ __('Yes, proceed') }}</a>
                </div>
            </div>
        </div>
    </div> --}}

@endsection
