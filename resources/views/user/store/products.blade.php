@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])

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
                            {{ __('Products') }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <div class="col-sm-12 col-lg-12">
                        <form class="card" action="{{ route('user.save.products', Request::segment(3)) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12">

                                        <div class="row" id="product">
                                            <h2 class="page-title my-3">
                                                {{ __('Product ') }}
                                            </h2>
                                        </div>

                                        <br>
                                        <div class="row" id="more-products"></div>

                                        <div class="col-lg-12">
                                            <button class="btn btn-primary" type="button" onclick="addProduct()">
                                                {{ __('Add One More Product') }}
                                            </button>
                                        </div>

                                        <div class="col-md-4 col-xl-4 my-3">
                                            <div class="mb-3">
                                                <button class="btn btn-primary" type="submit">
                                                    {{ __('Submit & Next') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                                            src="{{ asset('backend/img/undraw_printing_invoices_5r4r.svg') }}"
                                            alt="" height="128">
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
        var count = 0;
        var currentSelection = 0;

        function addProduct() {
            "use strict";
            if (count >= {{ $plan_details->no_of_services }}) {
                swal({
                    title: `{{ __('Oops!') }}`,
                    icon: 'warning',
                    text: `{{ __('You have reached your current plan limit.') }}`,
                    timer: 2000,
                    buttons: false,
                });
            } else {
                count++;
                var id = getRandomInt();
                var products = "<div class='row' id=" + id +
                    "><div class='col-md-6 col-xl-6'><div class='mb-3'><label class='form-label required'>{{ __('Product Badge') }}</label><input type='text' class='form-control' name='badge[]'placeholder='{{ __('Product Badge') }}...' required></div></div><div class='col-md-6 col-xl-6'><div class='mb-3'><label class='form-label'>{{ __('Product Image') }}</label><div class='input-group mb-2'><input type='text' class='image" +
                    id +
                    " media-model form-control' name='product_image[]' placeholder='{{ __('Product Image') }}' required><button class='btn btn-primary btn-md' type='button' onclick='openMedia(" +
                    id +
                    ")'>{{ __('Choose image') }}</button></div></div></div><div class='col-md-6 col-xl-6'> <div class='mb-3'> <label class='form-label'>{{ __('Product Name') }}</label> <input type='text' class='form-control' name='product_name[]' placeholder='{{ __('Product Name') }}' required> </div></div><div class='col-md-6 col-xl-6'><div class='mb-3'><label class='form-label required'>{{ __('Product Sub Title') }}</label><textarea class='form-control' name='product_subtitle[]' data-bs-toggle='autosize' placeholder='{{ __('Product Sub Title') }}...' required></textarea></div></div><div class='col-md-6 col-xl-6'><div class='mb-3'><label class='form-label required'>{{ __('Regular Price') }}</label><input type='number' class='form-control' name='regular_price[]' placeholder='{{ __('Regular Price') }}...' min='1' step='.001' required></div></div><div class='col-md-6 col-xl-6'><div class='mb-3'><label class='form-label required'>{{ __('Sales Price') }}</label><input type='number' class='form-control' name='sales_price[]' min='1' step='.001' placeholder='{{ __('Sales Price') }}...' required></div></div><div class='col-md-6 col-xl-6'><div class='mb-3'><label class='form-label required' for='product_status'>{{ __('Status') }}</label><select name='product_status[]' id='product_status' class='form-control' required><option value='instock'>{{ __('In Stock') }}</option><option value='outstock'>{{ __('Out of Stock') }}</option></select><a href='#' class='btn mt-3 btn-danger btn-sm' onclick='removeProduct(" +
                    id + ")'>{{ __('Remove') }}</a></div></div></div> <br></div></div>";
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
