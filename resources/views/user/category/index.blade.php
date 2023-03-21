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
                            {{ __('Product Category') }}
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="dropdown">
                            <a type="button" href="javasctipt:void(0)">
                                <button type="button" class="btn btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#categoryCreate">
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
                                            <th style="width: 10%">{{ __('S.No') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            {{-- <th>{{ __('Status') }}</th> --}}
                                            <th class="w-1">{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($productCategories) && count($productCategories) > 0)
                                            @foreach ($productCategories as $productCategory)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $productCategory->category_name }}</td>
                                                    {{-- <td>
                                                        @if ($productCategory->status)
                                                            <span class="badge bg-green">{{ __('Active') }}</span>
                                                        @else
                                                            <span class="badge bg-red">{{ __('Inactive') }}</span>
                                                        @endif
                                                    </td> --}}
                                                    <td>
                                                        <div class="btn-list flex-nowrap">
                                                            <a class="btn btn-primary btn-sm"
                                                                data-id="{{ $productCategory->id }}"
                                                                data-value="{{ $productCategory->category_name }}"
                                                                onclick="editCategory(this)"
                                                                href="javascript:void(0)">{{ __('Edit') }}</a>
                                                            <a class="btn btn-danger btn-sm"
                                                                data-id="{{ $productCategory->id }}"
                                                                onclick="deleteCategory(this)"
                                                                href="javascript:void(0)">{{ __('Delete') }}</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="font-weight-bold">


                                                <td class="text-center" colspan="4">
                                                    {{ __('No Product Category Found.') }}</td>

                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    @if (isset($productCategories))
                        <div
                            class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-block d-sm-block d-md-none d-lg-none d-xl-none">
                            <div class="row">

                                @foreach ($productCategories as $row)
                                    <div class="">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                                                        <h3 class="text-left">
                                                            <td>{{ $row->category_name }}</td>
                                                        </h3>
                                                    </div>

                                                    <div class="col-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
                                                        <div class="dropdown text-end">
                                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                Actions
                                                            </button>
                                                            <div class="dropdown-menu" style="">

                                                                <a class="dropdown-item text-dark"
                                                                    data-id="{{ $row->id }}"
                                                                    data-value="{{ $row->category_name }}"
                                                                    onclick="editCategory(this)"
                                                                    href="javascript:void(0)">{{ __('Edit') }}</a>


                                                                <a class="dropdown-item  text-danger"
                                                                    data-id="{{ $row->id }}"
                                                                    onclick="deleteCategory(this)"
                                                                    href="javascript:void(0)">
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
    <div class="modal fade" data-bs-backdrop="static" id="categoryCreate" tabindex="-1"
        aria-labelledby="categoryCreateLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                {{-- <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button> --}}

                <form action="{{ route('user.product.category.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <h5 class="modal-title" id="categoryCreateLabel">Category</h5>
                        <div class="form-group">
                            <label for="name" class=" form-label required">{{ __('Category Name') }}</label>
                            <input type="text" name="category_name"
                                class="form-control @error('name') border-danger @enderror" placeholder="Category Name"
                                required>
                            @error('category_name')
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
    <div class="modal fade" data-bs-backdrop="static" id="categoryEdit" tabindex="-1"
        aria-labelledby="categoryEditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                {{-- <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button> --}}

                <form id="editForm" action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        <h5 class="modal-title" id="categoryEditLabel">Category Edit</h5>
                        <div class="form-group">
                            <label for="name" class=" form-label required">{{ __('Category Name') }}</label>
                            <input type="hidden" name="id" id="category_edit_id"
                                value="{{ old('category_edit_id') ?? '' }}">
                            <input type="text" name="category_name_edit" id="category_edit"
                                class="form-control @error('category_name_edit') border-danger @enderror"
                                placeholder="Category Name" required>
                            @error('category_name_edit')
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
                    <div>{{ __('If you proceed, you will delete this category.') }}</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary me-auto"
                        data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <a class="btn btn-danger" id="category_id">{{ __('Yes, proceed') }}</a>
                </div>
            </div>
        </div>
    </div>


@endsection


@push('custom-js')

    @error('category_name')
        <script>
            $('document').ready(function() {
                $('#categoryCreate').modal('show');
            })
        </script>
    @enderror

    <script>
        function deleteCategory(event) {
            console.log(event);
            const {
                id
            } = event.dataset;
            $('#deleteModal').modal('show');
            $('#category_id').prop('href', "{{ route('user.product.category.index') }}/delete/" + id)
        }

        function editCategory(event) {
            console.log(event);
            const {
                id,
                value
            } = event.dataset;
            $('#category_edit_id').val(id);
            $('#category_edit').val(value);
            $('#editForm').prop('action', "{{ route('user.product.category.index') }}/update/" + id)
            $('#categoryEdit').modal('show');
        }
    </script>
@endpush
