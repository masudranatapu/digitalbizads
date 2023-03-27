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
                            {{ __('Update Image Gallery') }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <div class="col-sm-12 col-lg-12">
                        <form class="card" action="{{ route('user.update.galleries', Request::segment(3)) }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12">

                                        <div class="row">

                                            <h2 class="page-title my-3">
                                                {{ __('Gallery') }}
                                            </h2>

                                            @for ($i = 0; $i < count($galleries); $i++)
                                                <div class='row' id="{{ $i }}">
                                                    <div class="col-md-6 col-xl-6">
                                                        <div class="mb-3">
                                                            <label class="form-label required">{{ __('Gallery Image') }}
                                                                <span
                                                                    class='text-muted'>({{ __('Recommended : 200 x 200 pixels') }})</span></label>
                                                            <div class="input-group mb-2">
                                                                <input
                                                                    class="image{{ $galleries[$i]->id }} media-model form-control"
                                                                    name="gallery_image[]" type="text"
                                                                    value="{{ $galleries[$i]->gallery_image }}"
                                                                    placeholder="{{ __('Gallery Image') }}" required>
                                                                <button class="btn btn-primary btn-md" type="button"
                                                                    onclick="openMedia({{ $galleries[$i]->id }})">{{ __('Choose image') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-xl-6">
                                                        <div class="mb-3">
                                                            <label
                                                                class="form-label required">{{ __('Image Caption') }}</label>
                                                            <input class="form-control" name="caption[]" type="text"
                                                                value="{{ $galleries[$i]->caption }}"
                                                                placeholder="{{ __('Image Caption') }}..." required>
                                                            <button class='btn btn-danger btn-sm mt-2'
                                                                onclick='removeGallery({{ $i }})'>
                                                                {{ __('Remove') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endfor

                                            <br>
                                            <div class="row" id="more-gallery"></div>
                                            <div class="col-lg-12">
                                                <button class="btn btn-primary" type="button" onclick="addGallery()">
                                                    {{ __('Add New') }}
                                                </button>
                                            </div>

                                            <div class="col-md-4 col-xl-4 my-3">
                                                <div class="mb-3">

                                                    <a class="btn btn-primary"
                                                        href="{{ route('user.edit.business.hours', Request::segment(3)) }}">
                                                        {{ __('Skip & Continue') }}
                                                    </a>

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
        var count = {{ count($galleries) }};
        var currentSelection = 0;

        function addGallery() {
            "use strict";
            if (count >= {{ $plan_details->no_of_galleries }}) {
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
                var gallery =
                    "<div class='row' id=" + id +
                    "><div class='col-md-6 col-xl-6'><div class='mb-3'><label class='form-label required'>{{ __('Gallery Image') }} <span class='text-muted'>({{ __('Recommended : 200 x 200 pixels') }})</span></label><div class='input-group mb-2'><input type='text' class='image" +
                    id +
                    " media-model form-control' name='gallery_image[]' placeholder='{{ __('Gallery Image') }}' required><button class='btn btn-primary btn-md' type='button' onclick='openMedia(" +
                    id +
                    ")'>{{ __('Choose image') }}</button></div></div></div><div class='col-md-6 col-xl-6'> <div class='mb-3'> <label class='form-label required'>{{ __('Image Caption') }}</label> <input type='text' class='form-control' name='caption[]' placeholder='{{ __('Image Caption') }}...' required> <a href='#' class='btn mt-3 btn-danger btn-sm' onclick='removeGallery(" +
                    id + ")'>{{ __('Remove') }}</a> </div><br></div>";
                $("#more-gallery").append(gallery).html();
            }
        }

        function removeGallery(id) {
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
            "use strict";
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
