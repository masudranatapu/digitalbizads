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
                            {{ __('Whatsapp Stores Products') }}
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="dropdown">
                            <a type="button" href="{{ route('user.products.add', ['id' => $business_cards->card_id]) }}">
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
                                            <th>{{ __('SL.No') }}</th>
                                            <th>{{ __('Product ID') }}</th>
                                            <th>{{ __('Product Name') }}</th>
                                            <th>{{ __('Sales Price') }} </th>
                                            <th>{{ __('Regular Price') }} </th>
                                            <th>{{ __('Category') }}</th>
                                            <th>{{ __('Stock') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th class="w-1">{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if (!empty($business_cards->hasProduct) && $business_cards->hasProduct->count())
                                            @foreach ($business_cards->hasProduct as $product)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $product->product_id }}</td>
                                                    <td>
                                                        <a onclick="photoShow(this)" href="javascript:void(0)" data-src="{{ getPhoto($product->product_image) }}" >{{ $product->product_name }}</a>
                                                    </td>
                                                    <td>{{ $product->sales_price . $currency->symbol }}</td>
                                                    <td>{{ $product->regular_price . $currency->symbol }}</td>
                                                    <td class="text-muted">
                                                        {{ $product->hasCategory->category_name ?? '' }}</td>
                                                    <td class="text-muted">

                                                        @if ($product->product_stock <= 0)
                                                            <span class="badge bg-red">{{ __('Out of stock') }}</span>
                                                        @else
                                                            <span class="badge bg-green">{{ __('In-stock') }} ({{ $product->product_stock }}) </span>
                                                        @endif
                                                    </td>
                                                    <td class="text-muted">
                                                        @if ($product->status)
                                                            <span class="badge bg-green">{{ __('Active') }}</span>
                                                        @else
                                                            <span class="badge bg-red">{{ __('In-Active') }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="btn-list flex-nowrap">
                                                            <a class="btn btn-primary btn-sm"
                                                                href="{{ route('user.products.edit', ['id' => $product->product_id]) }}">{{ __('Edit') }}</a>

                                                            <button class="btn btn-danger btn-sm"
                                                                onclick="deleteProduct(this)"
                                                                data-url="{{ route('user.products.delete', ['id' => $product->product_id]) }}">
                                                                {{ __('Delete') }}</button>
                                                            @if ($product->is_variant)
                                                                <a class="btn btn-primary btn-sm"
                                                                    href="{{ route('user.product.variants', ['card_id' => $product->card_id, 'product_id' => $product->product_id]) }}">{{ __('Variants') }}</a>
                                                            @endif

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="font-weight-bold">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>{{ __('No Product Found.') }}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @if (!empty($business_cards->hasProduct) && $business_cards->hasProduct->count())
                        <div
                            class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-block d-sm-block d-md-none d-lg-none d-xl-none">
                            <div class="row">

                                @foreach ($business_cards->hasProduct as $row)
                                    <div class="">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                                                        <h3 class="text-left">
                                                            <td>
                                                                <a onclick="photoShow(this)" href="javascript:void(0)" data-src="{{ getPhoto($row->product_image) }}" >
                                                                {{ $row->product_name }}
                                                                </a>
                                                            </td>
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
                                                                    href="{{ route('user.products.edit', ['id' => $product->product_id]) }}">{{ __('Edit') }}</a>

                                                                @if ($product->is_variant)
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('user.product.variants', ['card_id' => $product->card_id, 'product_id' => $product->product_id]) }}">{{ __('Variants') }}</a>
                                                                @endif


                                                                <a class="dropdown-item text-danger"
                                                                    href="javascript:void(0)" onclick="deleteProduct(this)"
                                                                    data-url="{{ route('user.products.delete', ['id' => $product->product_id]) }}">{{ __('Delete') }}</a>

                                                                {{-- <a class="dropdown-item text-success"
                                                                    href="{{ route('card.preview', $row->card_url) }}"
                                                                    target="_blank">{{ __('Live') }}</a>

                                                                @if ($row->card_status == 'activated')
                                                                    <a class="open-model dropdown-item text-success"
                                                                        data-id="{{ $row->card_id }}"
                                                                        href="#openModel">{{ __('Disable') }}</a>
                                                                @else
                                                                    <a class="open-model dropdown-item text-success"
                                                                        data-id="{{ $row->card_id }}"
                                                                        href="#openModel">{{ __('Enable') }}</a>
                                                                @endif --}}

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


    <div class="modal modal-blur fade" id="photoModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="float-end" data-bs-dismiss="modal">{{ __('Close') }}</button>
                </div>
                <div class="modal-body">
                    <img src="" id="product_img" style="width: 100%" />
                </div>

            </div>
        </div>
    </div>


    <div class="modal modal-blur fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-title">
                        {{ __('Are you sure?') }}</div>
                    <div>
                        {{ __('If you proceed, you will delete this product.') }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary me-auto"
                        data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <a class="btn btn-danger" id="product_id">{{ __('Yes, proceed') }}</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteProduct(event) {

            const {
                url
            } = event.dataset;
            console.log(url);
            $('#deleteModal').modal('show');
            $('#product_id').prop('href', url);

        }

        var myModalEl = document.getElementById('deleteModal')
        myModalEl.addEventListener('hidden.bs.modal', function(event) {
            $('#product_id').prop('href', '');
        })


        function photoShow(event) {
            const {
                src
            } = event.dataset;

            $('#photoModal').modal('show');
            $('#product_img').prop('src', src);
    }
    </script>
@endsection
