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
                            {{ __('Product Variant') }}
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="dropdown">
                            <a class="btn btn btn-primary" href="{{ route('user.products.list', ['id' => $card_id]) }}">
                                <i class="fas fa-arrow-left"></i> &nbsp; Back to Product</a>
                            <a type="button" href="javasctipt:void(0)">
                                <button class="btn btn btn-primary" data-bs-toggle="modal" data-bs-target="#variantCreate"
                                    type="button">
                                    <svg class="icon icon-tabler icon-tabler-plus" xmlns="http://www.w3.org/2000/svg"
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
                                            <th style="width: 10%">{{ __('S.No') }}</th>
                                            <th>{{ __('Name') }}</th>

                                            <th class="w-1">{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($productVariants) && count($productVariants) > 0)
                                            @foreach ($productVariants as $productvariant)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $productvariant->name }}</td>

                                                    <td>
                                                        <div class="btn-list flex-nowrap">
                                                            <a class="btn btn-primary btn-sm"
                                                                data-url="{{ route('user.product.variants.update', ['variant' => $productvariant->id]) }}"
                                                                data-value="{{ $productvariant->name }}"
                                                                href="javascript:void(0)"
                                                                onclick="editvariant(this)">{{ __('Edit') }}</a>
                                                            <a class="btn btn-primary btn-sm"
                                                                href="{{ route('user.product.variants.option', ['product_id' => $product_id, 'variant' => $productvariant->id]) }}">{{ __('Option') }}</a>
                                                            <a class="btn btn-danger btn-sm"
                                                                data-url="{{ route('user.product.variants.delete', ['variant' => $productvariant->id]) }}"
                                                                href="javascript:void(0)"
                                                                onclick="deletevariant(this)">{{ __('Delete') }}</a>
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

                    @if (isset($productVariants))
                        <div
                            class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-block d-sm-block d-md-none d-lg-none d-xl-none">
                            <div class="row">

                                @foreach ($productVariants as $row)
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
                                                            <button class="btn btn-primary dropdown-toggle"
                                                                data-bs-toggle="dropdown" type="button"
                                                                aria-expanded="false">
                                                                Actions
                                                            </button>
                                                            <div class="dropdown-menu" style="">

                                                                <a class="dropdown-item text-info"
                                                                    data-url="{{ route('user.product.variants.update', ['variant' => $row->id, '']) }}"
                                                                    data-value="{{ $row->name }}"
                                                                    href="javascript:void(0)"
                                                                    onclick="editvariant(this)">{{ __('Edit') }}</a>
                                                                <a class="dropdown-item text-info"
                                                                    href="{{ route('user.product.variants.option', ['product_id' => $product_id, 'variant' => $row->id]) }}">{{ __('Option') }}</a>

                                                                <a class="dropdown-item  text-danger delete-card"
                                                                    data-url="{{ route('user.product.variants.delete', ['variant' => $row->id]) }}"
                                                                    href="javascript:void(0)" onclick="deletevariant(this)">
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
                    @endif
                </div>
            </div>
        </div>
        @include('user.includes.footer')
    </div>
    <div class="modal fade" id="variantCreate" data-bs-backdrop="static" aria-labelledby="variantCreateLabel"
        aria-hidden="true" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                {{-- <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button> --}}

                <form action="{{ route('user.product.variants.store', ['product_id' => $product_id]) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <h5 class="modal-title" id="variantCreateLabel">Variant</h5>
                        <div class="form-group">
                            <label class=" form-label required" for="name">{{ __('Variant Name') }}</label>
                            <input class="form-control @error('name') border-danger @enderror" name="variant_name"
                                type="text" placeholder="Variant Name" required>
                            @error('variant_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="variantEdit" data-bs-backdrop="static" aria-labelledby="variantEditLabel"
        aria-hidden="true" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                {{-- <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button> --}}

                <form id="editForm" action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        <h5 class="modal-title" id="variantEditLabel">Variant Edit</h5>
                        <div class="form-group">
                            <label class=" form-label required" for="name">{{ __('Variant Name') }}</label>

                            <input class="form-control @error('variant_name') border-danger @enderror" id="variant_edit"
                                name="variant_name" type="text" value="" placeholder="Variant Name" required>
                            @error('variant_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="deleteModal" role="dialog" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-title">{{ __('Are you sure?') }}</div>
                    <div>{{ __('If you proceed, you will delete this variant.') }}</div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal"
                        type="button">{{ __('Cancel') }}</button>
                    <a class="btn btn-danger" id="variant_id">{{ __('Yes, proceed') }}</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')

    @error('variant_name')
        <script>
            $('document').ready(function() {
                $('#variantCreate').modal('show');
            })
        </script>
    @enderror

    <script>
        function deletevariant(event) {
            console.log(event);
            const {
                url
            } = event.dataset;
            $('#deleteModal').modal('show');
            $('#variant_id').prop('href', url)
        }

        function editvariant(event) {
            console.log(event);
            const {
                value,
                url
            } = event.dataset;

            $('#variant_edit').val(value);
            $('#editForm').prop('action', url)
            $('#variantEdit').modal('show');
        }

        var myModalEl = document.getElementById('variantEdit')
        myModalEl.addEventListener('hidden.bs.modal', function(event) {
            $('#editForm').prop('action', '');
            $('#variant_edit').val('');


        })
        var myModalEl = document.getElementById('deleteModal')
        myModalEl.addEventListener('hidden.bs.modal', function(event) {
            $('#variant_id').prop('href', '')


        })
    </script>
@endpush
