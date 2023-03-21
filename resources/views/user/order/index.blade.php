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
                                            <th>{{ __('Name') }}</th>

                                            <th class="w-1">{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($orders) && count($orders) > 0)
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $order->name }}</td>

                                                    <td>
                                                        <div class="btn-list flex-nowrap">
                                                            <a class="btn btn-primary btn-sm"
                                                                href="javascript:void(0)">{{ __('View') }}</a>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="font-weight-bold">


                                                <td class="text-center" colspan="4">
                                                    {{ __('No Product Variant Found.') }}</td>

                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    {{--
                    @if (isset($orders))
                        <div
                            class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-block d-sm-block d-md-none d-lg-none d-xl-none">
                            <div class="row">

                                @foreach ($orders as $row)
                                    <div class="">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                                                        <h3 class="text-left">
                                                            <td>{{ $row->name }}</td>
                                                        </h3>
                                                    </div>

                                                    <div class="col-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
                                                        <div class="dropdown text-end">
                                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                Actions
                                                            </button>
                                                            <div class="dropdown-menu" style="">

                                                                <a class="dropdown-item text-info"
                                                                    data-url="{{ route('user.product.variants.update', ['variant' => $row->id, '']) }}"
                                                                    data-value="{{ $row->name }}"
                                                                    onclick="editvariant(this)"
                                                                    href="javascript:void(0)">{{ __('Edit') }}</a>
                                                                <a class="dropdown-item text-info"
                                                                    href="#">{{ __('Option') }}</a>



                                                                <a class="dropdown-item  text-danger delete-card"
                                                                    data-url="{{ route('user.product.variants.delete', ['variant' => $row->id]) }}"
                                                                    onclick="deletevariant(this)" href="javascript:void(0)">
                                                                    {{ __('Delete') }}
                                                                </a>
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
                    @endif --}}
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
