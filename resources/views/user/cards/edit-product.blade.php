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
                            {{ __('Edit Products') }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <div class="col-sm-12 col-lg-12">
                        <form action="{{ route('user.products.update', ['id' => $products->product_id]) }}" method="post"
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
                                                            placeholder='{{ __('Product Badge') }}...'
                                                            value="{{ $products->badge }}" required>
                                                    </div>
                                                </div>
                                                <div class='col-md-6 col-xl-6'>
                                                    <div class='mb-3'>
                                                        <label class='form-label required'>{{ __('Product Image') }}</label>
                                                        <div class='input-group mb-2'>
                                                            <input type='text'
                                                                class='image{{ $products->id }} media-model form-control'
                                                                name='product_image'
                                                                placeholder='{{ __('Product Image') }}'
                                                                value="{{ $products->product_image }}" required>
                                                            <button class='btn btn-primary btn-md' type='button'
                                                                onclick="openMedia({{ $products->id }})">{{ __('Choose image') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='col-md-6 col-xl-6'>
                                                    <div class='mb-3'>
                                                        <label class='form-label required'>{{ __('Product Name') }}</label>
                                                        <input type='text' class='form-control' name='product_name'
                                                            placeholder='{{ __('Product Name') }}'
                                                            value="{{ $products->product_name }}" required>
                                                    </div>
                                                </div>
                                                <div class='col-md-6 col-xl-6'>
                                                    <div class='mb-3'>
                                                        <label
                                                            class='form-label required'>{{ __('Product Sub Title') }}</label>
                                                        <textarea class='form-control' name='product_subtitle' data-bs-toggle='autosize'
                                                            placeholder='{{ __('Product Sub Title') }}...' required>{{ $products->product_subtitle }}</textarea>
                                                    </div>
                                                </div>
                                                <div class='col-md-6 col-xl-6'>
                                                    <div class='mb-3'><label
                                                            class='form-label required'>{{ __('Regular Price') }}</label>
                                                        <input type='number' class='form-control' name='regular_price'
                                                            min='1' placeholder='{{ __('Regular Price') }}...'
                                                            value="{{ $products->regular_price }}" min='1'
                                                            step='.001' required>
                                                    </div>
                                                </div>
                                                <div class='col-md-6 col-xl-6'>
                                                    <div class='mb-3'>
                                                        <label class='form-label required'>{{ __('Sales Price') }}</label>
                                                        <input type='number' class='form-control' name='sales_price'
                                                            min='1' step='.001'
                                                            value="{{ $products->sales_price }}"
                                                            placeholder='{{ __('Sales Price') }}...' required>
                                                    </div>
                                                </div>
                                                <div class='col-md-6 col-xl-6'>
                                                    <div class='mb-3'>
                                                        <label class='form-label required'
                                                            for='product_status'>{{ __('Status') }}</label>
                                                        <select name='product_status' id='product_status'
                                                            class='form-control' required>
                                                            <option value='instock'
                                                                {{ $products->product_status == 'instock' ? 'selected' : '' }}>
                                                                {{ __('In Stock') }}</option>
                                                            <option value='outstock'
                                                                {{ $products->product_status == 'outstock' ? 'selected' : '' }}>
                                                                {{ __('Out of Stock') }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class='col-md-6 col-xl-6'>
                                                    <div class='mb-3'>
                                                        <label class='form-label required'
                                                            for='product_status'>{{ __('Product Type') }}</label>
                                                        <select name='product_type' id='product_type' class='form-control'
                                                            required>
                                                            <option value="" class="d-none">
                                                                {{ __('Select Product Type') }}</option>
                                                            <option @if ($products->is_variant) selected @endif
                                                                value='1'>
                                                                {{ __('Variant') }}</option>
                                                            <option @if (!$products->is_variant) selected @endif
                                                                value='0'>
                                                                {{ __('Non Variant') }}</option>
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
                                                                <option value='{{ $productCategorie->id }}'
                                                                    @if ($products->category_id == $productCategorie->id) selected @endif>
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
                                            {{ __('Update') }}
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
            var count = {{ isset($products) }};
            var currentSelection = 0;

            function addProduct() {
                "use strict";
                if (count >= {{ $plan_details->no_of_services }}) {
                    swal({
                        title: `{{ __('Oops!') }}`,
                        icon: 'warning',
                        text: `{{ __('Please add atleast one feature') }}`,
                        timer: 2000,
                        buttons: false,
                    });
                } else {
                    count++;
                    var id = getRandomInt();

                    var selectOpion = "";
                    selectOpion +=
                        "</div></div><div class='col-md-6 col-xl-6'><label class='form-label required' for='category'>Category</label><select class='form-control' name='category' id='category'>"
                    @foreach ($productCategories as $productCategorie)
                        selectOpion +=
                            "<option value='{{ $productCategorie->id }}'>{{ $productCategorie->category_name }}</option>";
                    @endforeach

                    selectOpion += "</select></div>";







                    var products = "<div class='row' id=" + id +
                        "><div class='col-md-6 col-xl-6'><div class='mb-3'><label class='form-label required'>{{ __('Product Badge') }}</label><input type='text' class='form-control' name='badge'placeholder='{{ __('Product Badge') }}...' required></div></div><div class='col-md-6 col-xl-6'> <div class='mb-3'><label class='form-label required'>{{ __('Product Image') }} </label><div class='input-group mb-2'><input type='text'class='image" +
                        id +
                        " media-model form-control' name='product_image' placeholder='{{ __('Product Image') }}' required><button class='btn btn-primary btn-md' type='button' onclick='openMedia(" +
                        id +
                        ")'>{{ __('Choose image') }}</button></div></div></div><div class='col-md-6 col-xl-6'> <div class='mb-3'> <label class='form-label required'>{{ __('Product Name') }}</label> <input type='text' class='form-control' name='product_name' placeholder='{{ __('Product Name') }}' required> </div></div><div class='col-md-6 col-xl-6'><div class='mb-3'><label class='form-label required'>{{ __('Product Sub Title') }}</label><textarea class='form-control' name='product_subtitle' data-bs-toggle='autosize' placeholder='{{ __('Product Sub Title') }}...' required></textarea></div></div><div class='col-md-6 col-xl-6'><div class='mb-3'><label class='form-label required'>{{ __('Regular Price') }}</label><input type='number' class='form-control' name='regular_price' min='1' step='.001' placeholder='{{ __('Regular Price') }}...' required></div></div><div class='col-md-6 col-xl-6'><div class='mb-3'><label class='form-label required'>{{ __('Sales Price') }}</label><input type='number' class='form-control' name='sales_price' min='1' step='.001' placeholder='{{ __('Sales Price') }}...' required></div></div><div class='col-md-6 col-xl-6'><div class='mb-3'><label class='form-label required' for='product_status'>{{ __('Status') }}</label><select name='product_status' id='product_status' class='form-control' required><option value='instock'>{{ __('In Stock') }}</option><option value='outstock'>{{ __('Out of Stock') }}</option></select>" +
                        selectOpion + "<br><div><a href='#' class='btn my-3 btn-danger btn-sm' onclick='removeProduct(" +
                        id + ")'>{{ __('Remove') }}</a></div></div></div></div> <br></div> </div>";
                    console.log(products);
                    $("#more-products").append(products).html();
                }
            }

            function removeProduct(id) {
                "use strict";
                $("#" + id).remove();
            }

            function getRandomInt() {
                min = Math.ceil(0);
                max = Math.floor(9999999999);
                return Math.floor(Math.random() * (max - min) + min); //The maximum is exclusive and the minimum is inclusive
            }

            function openMedia(id) {
                "use strict";
                currentSelection = id;
                $('#openMediaModel').modal('show');
            }

            $(".media_image").on("click", function() {
                var imgUri = $(this).attr('id');
                $('#openMediaModel').modal('hide');
                $('.image' + currentSelection).val(imgUri);
            });

            function chooseImg(a) {
                "use strict";
                var imgUri = $(a).attr('id');
                $('#openMediaModel').modal('hide');
                $('.image' + currentSelection).val(imgUri);
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
