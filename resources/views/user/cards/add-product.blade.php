@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])
@section('store-nav', 'active')
@section('css')
    <link href="{{ asset('backend/css/dropzone.min.css') }}" rel="stylesheet">
    <script src="{{ asset('backend/js/dropzone.min.js') }}"></script>
@endsection

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
                            {{ __('Add Products') }}
                        </h2>
                    </div>

                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <div class="col-sm-12 col-lg-12">
                        <form action="{{ route('user.products.store', ['id' => $id]) }}" method="post"
                            enctype="multipart/form-data" class="card">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12">

                                        <div class="row">

                                            <h2 class="page-title my-3">
                                                {{ __('Products') }}
                                            </h2>


                                            <div class='row' id="">
                                                <div class='col-md-6 col-xl-6'>
                                                    <div class='mb-3'>
                                                        <label class='form-label required'>{{ __('Product Badge') }}</label>
                                                        <input type='text' class='form-control' name='badge'
                                                            placeholder='{{ __('Product Badge') }}...' value=""
                                                            required>
                                                    </div>
                                                </div>
                                                <div class='col-md-6 col-xl-6'>
                                                    <div class='mb-3'>
                                                        <label class='form-label required'>{{ __('Product Image') }}</label>
                                                        <div class='input-group mb-2'>
                                                            <input type='text' class='image media-model form-control'
                                                                name='product_image' placeholder='{{ __('Product Image') }}'
                                                                value="" required>
                                                            <button class='btn btn-primary btn-md' type='button'
                                                                onclick="openMedia()">{{ __('Choose image') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='col-md-6 col-xl-6'>
                                                    <div class='mb-3'>
                                                        <label class='form-label required'>{{ __('Product Name') }}</label>
                                                        <input type='text' class='form-control' name='product_name'
                                                            placeholder='{{ __('Product Name') }}' value="" required>
                                                    </div>
                                                </div>
                                                <div class='col-md-6 col-xl-6'>
                                                    <div class='mb-3'>
                                                        <label
                                                            class='form-label required'>{{ __('Product Sub Title') }}</label>
                                                        <textarea class='form-control' name='product_subtitle' data-bs-toggle='autosize'
                                                            placeholder='{{ __('Product Sub Title') }}...' required></textarea>
                                                    </div>
                                                </div>
                                                <div class='col-md-6 col-xl-6'>
                                                    <div class='mb-3'><label
                                                            class='form-label required'>{{ __('Regular Price') }}</label>
                                                        <input type='number' class='form-control' name='regular_price'
                                                            min='1' placeholder='{{ __('Regular Price') }}...'
                                                            value="" min='1' step='.001' required>
                                                    </div>
                                                </div>
                                                <div class='col-md-6 col-xl-6'>
                                                    <div class='mb-3'>
                                                        <label class='form-label required'>{{ __('Sales Price') }}</label>
                                                        <input type='number' class='form-control' name='sales_price'
                                                            min='1' step='.001' value=""
                                                            placeholder='{{ __('Sales Price') }}...' required>
                                                    </div>
                                                </div>
                                                <div class='col-md-6 col-xl-6'>
                                                    <div class='mb-3'>
                                                        <label class='form-label required'
                                                            for='product_status'>{{ __('Status') }}</label>
                                                        <select name='product_status' id='product_status'
                                                            class='form-control' required>
                                                            <option value='instock'>
                                                                {{ __('In Stock') }}</option>
                                                            <option value='outstock'>
                                                                {{ __('Out of Stock') }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class='col-md-6 col-xl-6'>
                                                    <div class='mb-3'>
                                                        <label class='form-label required'
                                                            for='product_status'>{{ __('Category') }}</label>
                                                        <select name='category' id='category' class='form-control'
                                                            required>
                                                            @foreach ($productCategories as $productCategorie)
                                                                <option value='{{ $productCategorie->id }}'>
                                                                    {{ $productCategorie->category_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2 col-xl-2 my-3">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary btn-block" style="width: 178px">
                                            {{ __('Save') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('user.includes.footer')

    <div class="modal modal-blur fade" id="openMediaModel" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Media Library') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row row-cards" id="captions">
                        {{-- Upload multiple images --}}
                        <div class="col-sm-12 col-lg-12 mb-4">
                            <form action="{{ route('user.multiple') }}" class="dropzone" id="dropzone"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="dz-message">
                                    {{ __('Drag and Drop Single/Multiple Files Here') }} <br>
                                </div>
                            </form>
                        </div>

                        @if (!empty($media) && $media->count())
                            @foreach ($media as $gallery)
                                <div class="col-sm-3 col-lg-3">
                                    <div class="card card-sm">
                                        <div class="d-block">
                                            <div class="media_image card-img-top img-responsive img-responsive-16by9"
                                                id="{{ $gallery->media_url }}"
                                                style="background-image: url({{ asset($gallery->media_url) }})"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="empty">
                                <div class="empty-img"><img
                                        src="{{ asset('backend/img/undraw_printing_invoices_5r4r.svg') }}" height="128"
                                        alt="">
                                </div>
                                <p class="empty-title">{{ __('No media found') }}</p>
                                <p class="empty-subtitle text-muted">
                                    {{ __('Try adjusting your add to find what you are looking for.') }}
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">{{ __('Close') }}</button>
                </div>
            </div>
        </div>
    </div>

    @push('custom-js')
        <script>
            var currentSelection = 0;



            function getRandomInt() {
                min = Math.ceil(0);
                max = Math.floor(9999999999);
                return Math.floor(Math.random() * (max - min) + min); //The maximum is exclusive and the minimum is inclusive
            }

            function openMedia() {
                "use strict";
                $('#openMediaModel').modal('show');
            }

            $(".media_image").on("click", function() {
                var imgUri = $(this).attr('id');
                $('#openMediaModel').modal('hide');
                $('.image').val(imgUri);
            });

            function chooseImg(a) {
                "use strict";
                console.log(a);
                var imgUri = $(a).attr('id');
                $('#openMediaModel').modal('hide');
                $('.image').val(imgUri);
            }
        </script>
        <script type="text/javascript">
            Dropzone.options.dropzone = {
                maxFilesize: {{ env('SIZE_LIMIT') / 1024 }},
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                init: function() {
                    this.on("success", function(file, response) {
                        var uploadImages =
                            `<div class="col-sm-3 col-lg-3">\
                    <div class="card card-sm">\
                        <div class="d-block">\
                            <div class="media_image card-img-top img-responsive img-responsive-16by9" onclick="chooseImg(this)" id="images/` +
                            response.image_url +
                            `" style="background-image: url({{ env('APP_URL') }}/images/` + response
                            .image_url + `)"></div>\
                        </div>\
                    </div>\
                </div>`;

                        $("#captions").append(uploadImages).html();

                        // Hidden empty
                        $(".empty").hide();

                        $('#openMediaModel').modal('hide');
                        $('.image' + currentSelection).val("images/" + response.image_url);
                    });
                }
            };
        </script>
    @endpush
    </div>
@endsection
