@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])

@section('css')
<link rel="stylesheet" href="{{ asset('css/all.css') }}" />
<link rel="stylesheet" href="{{ asset('css/bootstrap-iconpicker.min.css') }}" />
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
                        {{ __('Card Features') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-md-12 col-xl-12">
                    <form action="{{ route('user.save.social.links', Request::segment(3)) }}" method="post"
                        class="card">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div id="more-features" class="row"></div>
                                <div class="col-lg-12">
                                    <button type="button" onclick="addFeature()" class="btn btn-primary">
                                        {{ __('Add One More Features') }}
                                    </button>
                                </div>

                                <div class="col-md-4 col-lg-4 my-3">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Submit & Next') }}
                                        </button>
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
</div>

@endsection



@push('custom-js')
<script type="text/javascript" src="{{ asset('backend/js/fontawesome-iconpicker.min.js') }}"></script>
<script>
    var count = 0;
    function addFeature() {
    "use strict";
    if (count>={{ $plan_details->no_of_features}}) {
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
        var features = "<div class='row' id="+ id +"><div class='col-md-1 col-lg-2'><div class='mb-3 mt-2'><label class='form-label required'>{{ __('Icon') }}</label><div class='input-group'><input type='text' class='form-control' placeholder='{{ __('Choose Icon') }}' id='iconpick"+ id +"' onclick='openPicker("+ id +")' name='icon[]' required readonly></div></div></div><div class='col-md-2 col-lg-2'><div class='mb-3 mt-2'><label class='form-label required' for='type'>{{ __('Display type') }}</label><select name='type[]' id='type' class='type"+ id +" form-control' onchange='changeLabel("+ id +")' required> <option value='' disabled selected>{{ __('Choose Type') }}</option><option value='text'>{{ __('Default') }}</option><option value='address'>{{ __('Address') }}</option><option value='email'>{{ __('Email') }}</option><option value='tel'>{{ __('Phone') }}</option><option value='wa'>{{ __('WhatsApp') }}</option><option value='url'>{{ __('Link') }}</option><option value='youtube'>{{ __('Youtube Video') }}</option><option value='map'>{{ __('Google Map') }}</option></select></div></div><div class='col-md-3 col-lg-3'><div class='mb-3 mt-2'><label class='form-label required'>{{ __('Label') }}</label><input type='text' class='lbl"+ id +" form-control' name='label[]' placeholder='{{ __('Label') }}...' required></div></div><div class='col-md-4 col-lg-4'><div class='mb-3 mt-2'><label class='form-label required'>{{ __('Content') }}</label><input type='text' class='textlbl"+ id +" form-control' name='value[]' placeholder='{{ __('Type something') }}...' required></div></div><div class='col-lg-1 col-md-1'> <div class='mb-2 pt-1 mt-4'><button type='button' class='btn btn-transparent' onclick='removeFeature("+id+")'><i class='fa fa-times text-muted'></i></button></div></div></div>";
        $("#more-features").append(features).html();
    }
    }

    addFeature();

    function removeFeature(id) {
    "use strict";
    if(count == 1){
        swal({
        title: `{{ __('Oops!') }}`,
        icon: 'warning',
        text: `{{ __('Please add atleast one feature') }}`,
        timer: 2000,
        buttons: false,
    });
    }else{
        $("#"+id).remove();
        count--;
    }

    }

    function getRandomInt() {
        min = Math.ceil(0);
        max = Math.floor(9999999999);
        return Math.floor(Math.random() * (max - min) + min); //The maximum is exclusive and the minimum is inclusive
    }

    function openPicker(id){
        "use strict";
        $("#iconpick"+id).iconpicker({ animation:true,hideOnSelect:true, placement: "inline",  templates: {    popover: '<div class="iconpicker-popover popover position-absolute"><div class="arrow"></div>' +
            '<div class="popover-title"></div><div class="popover-content"></div></div>', iconpickerItem: '<a role="button" class="iconpicker-item"><i></i></a>' } });
    }

    function changeLabel(id) {
        "use strict";
        var label = `{{ __('Label') }}`;
        var textlabel = `{{ __('Type something') }}`;
        let lbl = document.querySelector('.lbl'+id);
        let textlbl = document.querySelector('.textlbl'+id);
        let type = document.querySelector('.type'+id).value;

        if(type == 'address') {
            label = `{{ __('Address') }}`;
            textlabel = `{{ __('For ex: Chennai, Tamilnadu, India') }}`;
        } else if(type == 'text') {
            label = `{{ __('About us') }}`;
            textlabel = `{{ __('For ex: Lorem Ipsum is simply dummy text of') }}`;
        } else if(type == 'email') {
            label = `{{ __('Email Address') }}`;
            textlabel = `{{ __('For ex: support@website.com') }}`;
        } else if(type == 'tel') {
            label = `{{ __('Phone Number') }}`;
            textlabel = `{{ __('For ex: +919876543210') }}`;
        } else if(type == 'wa') {
            label = `{{ __('WhatsApp') }}`;
            textlabel = `{{ __('For ex: 919876543210') }}`;
        } else if(type == 'url') {
            label = `{{ __('Website') }}`;
            textlabel = `{{ __('For ex: website.com') }}`;
        } else if(type == 'youtube') {
            label = `{{ __('Video Title') }}`;
            textlabel = `{{ __('For ex: https://www.youtube.com/watch?v=li5ths352') }}`;
        } else if(type == 'map') {
            label = `{{ __('California') }}`;
            textlabel = `{{ __("For ex: <iframe src='https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3924.7798234706065!2d77.98194106479716!3d10.359482142605264!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b00ab9baf4b4101%3A0x9d6d57a812be5cc6!2sCapsimint%20Technologies%20-%20Web%2C%20Mobile%20App%20and%20Software%20Development%20Company!5e0!3m2!1sen!2sin!4v1638283593135!5m2!1sen!2sin'></iframe>") }}`;
        }

        lbl.placeholder = label;
        textlbl.placeholder = textlabel;
    }
</script>
@endpush
