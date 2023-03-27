@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])
@section('store-nav', 'active')
@push('css')
    <link href="{{ asset('backend/css/dropzone.min.css') }}" rel="stylesheet">
    <script src="{{ asset('backend/js/dropzone.min.js') }}"></script>
@endpush

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
                            {{ __('Edit Variant Option') }}
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="dropdown">
                            <a class="btn btn-primary" type="button"
                                href="{{ route('user.product.variants.option', ['product_id' => $option->product_id, 'variant' => $option->variant_id]) }}">

                                <i class="fas fa-arrow-left"></i>&nbsp;
                                {{ __('Back') }}

                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <div class="col-sm-12 col-lg-12">
                        <form class="card" action="{{ route('user.variants.option.update', ['option' => $option->id]) }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12">

                                        <div class="row">

                                            <h2 class="page-title my-3">
                                                {{ __('Edit Variant Option') }}
                                            </h2>

                                            <div class='row' id="">
                                                <div class='col-md-6 col-xl-6'>
                                                    <div class='mb-3'>
                                                        <label class="form-label required"
                                                            for="name">{{ __('Option Name') }}</label>
                                                        <input
                                                            class="form-control @error('option_name') border-danger @enderror"
                                                            name="option_name" type="text"
                                                            value="{{ old('option_name') ?? $option->name }}"
                                                            placeholder="Option Name" required>
                                                        @error('option_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class='col-md-6 col-xl-6'>
                                                    <div class='mb-3'>
                                                        <label class='form-label required'>{{ __('Option Image') }}</label>
                                                        <div class='input-group mb-2'>
                                                            <input class='image media-model form-control'
                                                                name='option_image' type='text'
                                                                value="{{ $option->photo }}"
                                                                placeholder='{{ __('Option Image') }}' required>
                                                            <button class='btn btn-primary btn-md' type='button'
                                                                onclick="openMedia()">{{ __('Choose image') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='col-md-6 col-xl-6'>
                                                    <div class='mb-3'>
                                                        <label class="form-label required"
                                                            for="stock">{{ __('Option Stock') }}</label>
                                                        <input
                                                            class="form-control @error('option_stock') border-danger @enderror"
                                                            name="option_stock" type="number"
                                                            value="{{ old('option_stock') ?? $option->stock }}"
                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                            placeholder="Option Stock" required>
                                                        @error('option_stock')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class='col-md-6 col-xl-6'>
                                                    <div class='mb-3'>
                                                        <label class="form-label required"
                                                            for="price">{{ __('Option Price') }}</label>
                                                        <input class="form-control @error('price') border-danger @enderror"
                                                            name="option_price" type="number"
                                                            value="{{ old('option_price') ?? $option->price }}"
                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                            placeholder="Option Price" required>
                                                        @error('option_price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2 col-xl-2 my-3">
                                    <div class="mb-3">
                                        <button class="btn btn-primary btn-block" type="submit" style="width: 178px">
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

    <div class="modal modal-blur fade" id="openMediaModel" role="dialog" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Media Library') }}</h5>
                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row row-cards" id="captions">
                        {{-- Upload multiple images --}}
                        <div class="col-sm-12 col-lg-12 mb-4">
                            <form class="dropzone" id="dropzone" action="{{ route('user.multiple') }}"
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
                                        src="{{ asset('backend/img/undraw_printing_invoices_5r4r.svg') }}" alt=""
                                        height="128">
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
                    <button class="btn me-auto" data-bs-dismiss="modal" type="button">{{ __('Close') }}</button>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection

@push('script')
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

                    $('#openMediaModel').modal('show');
                    $('.image' + currentSelection).val("images/" + response.image_url);
                });
            }
        };
    </script>
@endpush
