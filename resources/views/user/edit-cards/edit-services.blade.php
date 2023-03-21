@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])

@push('css')
<link href="{{ asset('backend/css/dropzone.min.css')}}" rel="stylesheet">
<script src="{{ asset('backend/js/dropzone.min.js')}}"></script>
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
                        {{ __('Update Services') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-sm-12 col-lg-12">
                    <form action="{{ route('user.update.services', Request::segment(3)) }}" method="post"
                        enctype="multipart/form-data" class="card">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12">

                                    <div class="row">

                                        <h2 class="page-title my-3">
                                            {{ __('Services') }}
                                        </h2>

                                        @for ($i = 0; $i < count($services); $i++)
                                        <div class='row' id="{{ $i }}">
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Service Image') }} <span class='text-muted'>({{ __('Recommended : 200 x 200 pixels') }})</span></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text"
                                                            class="image{{ $services[$i]->id }} media-model form-control"
                                                            name="service_image[]"
                                                            placeholder="{{ __('Service Image') }}"
                                                            value="{{ $services[$i]->service_image }}" required>
                                                        <button class="btn btn-primary btn-md" type="button"
                                                            onclick="openMedia({{ $services[$i]->id }})">{{ __('Choose image') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Service Name') }}</label>
                                                    <input type="text" class="form-control" name="service_name[]"
                                                        placeholder="{{ __('Service Name') }}..."
                                                        value="{{ $services[$i]->service_name }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label
                                                        class="form-label required">{{ __('Service Description') }}</label>
                                                    <input type="text" class="form-control" name="service_description[]"
                                                        placeholder="{{ __('Service Description') }}..."
                                                        value="{{ $services[$i]->service_description }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label required"
                                                        for="enquiry">{{ __('Enquiry Button') }}</label>
                                                    <select name="enquiry[]" id="enquiry" class="form-control">
                                                        <option value="Enabled"
                                                            {{ $services[$i]->enquiry == 'Enabled' ? 'selected' : '' }}>
                                                            {{ __('Enabled') }}</option>
                                                        <option value="Disabled"
                                                            {{ $services[$i]->enquiry == 'Disabled' ? 'selected' : '' }}>
                                                            {{ __('Disabled') }}</option>
                                                    </select>
                                                    <button class='btn btn-danger btn-sm mt-2'
                                                        onclick='removeService({{ $i }})'>
                                                        {{ __('Remove') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <br>
                        <div id="more-services" class="row"></div>

                        <div class="col-lg-12">
                            <button type="button" onclick="addService()" class="btn btn-primary">
                                {{ __('Add New') }}
                            </button>
                        </div>

                        <div class="col-md-4 col-xl-4 my-3">
                            <div class="mb-3">
                                <a href="{{ route('user.edit.galleries', Request::segment(3)) }}"
                                    class="btn btn-primary">
                                    {{ __('Skip & Continue') }}
                                </a>

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit & Next') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('user.includes.footer')

    <div class="modal modal-blur fade" id="openMediaModel" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Media Library')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row row-cards" id="captions">
                        {{-- Upload multiple images --}}
                        <div class="col-sm-12 col-lg-12 mb-4">
                            <form action="{{ route('user.multiple') }}" class="dropzone" id="dropzone" enctype="multipart/form-data">
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

</div>
@endsection


@push('custom-js')
<script type="text/javascript" src="{{ asset('backend/js/fontawesome-iconpicker.min.js') }}"></script>
<script>
    var count = {{ count($services) }};
var currentSelection = 0;
function addService() {
"use strict";
if (count>={{ $plan_details->no_of_services}}) {
    swal({
        title: `{{ __('Oops!') }}`,
        icon: 'warning',
        text: `{{ __('You have reached your current plan limit.') }}`,
        timer: 2000,
        buttons: false,
    });
}
else {
    count++;
    var id = getRandomInt();
    var services = "<div class='row' id="+ id +"><div class='col-md-6 col-xl-6'><div class='mb-3'><label class='form-label required'>{{ __('Service Image') }} <span class='text-muted'>({{ __('Recommended : 200 x 200 pixels') }})</span></label><div class='input-group mb-2'><input type='text' class='image"+ id +" media-model form-control' name='service_image[]' placeholder='{{ __('Service Image') }}' required><button class='btn btn-primary btn-md' type='button' onclick='openMedia("+ id +")'>{{ __('Choose image') }}</button></div></div></div><div class='col-md-6 col-xl-6'> <div class='mb-3'> <label class='form-label'>{{ __('Service Name') }}</label> <input type='text' class='form-control' name='service_name[]' placeholder='{{ __('Service Name') }}' required> </div></div><div class='col-md-6 col-xl-6'> <div class='mb-3'> <label class='form-label'>{{ __('Service Description') }}</label> <input type='text' class='form-control' name='service_description[]' placeholder='{{ __('Service Description') }}...' required> </div></div><div class='col-md-6 col-xl-6'> <div class='mb-3'> <label class='form-label' for='enquiry'>{{ __('Enquiry Button') }}</label> <select name='enquiry[]' id='enquiry' class='form-control' required> <option value='Enabled'>{{ __('Enabled') }}</option> <option value='Disabled'>{{ __('Disabled') }}</option> </select> <a href='#' class='btn mt-3 btn-danger btn-sm' onclick='removeService("+id+")'>{{ __('Remove') }}</a>  </div><br></div>";
    $("#more-services").append(services).html();
    }
}


function removeService(id) {
"use strict";
    $("#"+id).remove();
    count--;
}

function getRandomInt() {
    min = Math.ceil(0);
    max = Math.floor(9999999999);
    return Math.floor(Math.random() * (max - min) + min); //The maximum is exclusive and the minimum is inclusive
}

function openMedia(id){
    "use strict";
    currentSelection = id;
    $('#openMediaModel').modal('show');
}

$(".media_image").on( "click", function() {
    "use strict";
    var imgUri = $(this).attr('id');
    $('#openMediaModel').modal('hide');
    $('.image'+currentSelection).val(imgUri);
});

function chooseImg(a){
    "use strict";
    var imgUri = $(a).attr('id');
    $('#openMediaModel').modal('hide');
    $('.image'+currentSelection).val(imgUri);
}
</script>

<script type="text/javascript">
    Dropzone.options.dropzone = {
        maxFilesize  : {{ env('SIZE_LIMIT')/1024 }},
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        init: function() {
        this.on("success", function(file, response) {
            var uploadImages = `<div class="col-sm-3 col-lg-3">\
                <div class="card card-sm">\
                    <div class="d-block">\
                        <div class="media_image card-img-top img-responsive img-responsive-16by9" onclick="chooseImg(this)" id="images/`+response.image_url+`" style="background-image: url({{ env('APP_URL') }}/images/`+response.image_url+`)"></div>\
                    </div>\
                </div>\
            </div>`;

            $("#captions").append(uploadImages).html();

            // Hidden empty
            $(".empty").hide();

            $('#openMediaModel').modal('hide');
            $('.image'+currentSelection).val("images/"+response.image_url);
        });
    }
    };
</script>
@endpush
