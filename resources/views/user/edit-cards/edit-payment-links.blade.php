@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])

@push('css')
    <link href="{{ asset('css/all.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap-iconpicker.min.css') }}" rel="stylesheet" />
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
                            {{ __('Edit Payment Listed') }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <div class="col-sm-12 col-lg-12">
                        <form class="card" action="{{ route('user.update.payment.links', Request::segment(3)) }}"
                            method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-lg-12">

                                        <div class="row">

                                            @for ($i = 0; $i < count($payments); $i++)
                                                <div class='row' id="{{ $i }}">
                                                    <div class='col-lg-2 col-md-2'>
                                                        <div class='mb-3 mt-2'>
                                                            <label class='form-label required'>{{ __('Icon') }}</label>
                                                            <div class='input-group'>
                                                                <input class='form-control' id='iconpick{{ $i }}'
                                                                    name='icon[]' type='text'
                                                                    value="{{ $payments[$i]->icon }}"
                                                                    placeholder='{{ __('Choose Icon') }}'
                                                                    onclick='openPicker({{ $i }})' readonly
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-2 col-md-2'>
                                                        <div class='mb-3 mt-2'>
                                                            <label class='form-label required'
                                                                for='type'>{{ __('Display type') }}</label>
                                                            <select class='type{{ $payments[$i]->id }} form-control'
                                                                id='type' name='type[]'
                                                                onchange='changeLabel({{ $payments[$i]->id }})' required>
                                                                <option value='' disabled selected>
                                                                    {{ __('Choose Type') }}
                                                                </option>
                                                                <option value='text'
                                                                    {{ $payments[$i]->type == 'text' || $payments[$i]->type == 'textarea' ? 'selected' : '' }}>
                                                                    {{ __('Default') }}</option>
                                                                <option value='url'
                                                                    {{ $payments[$i]->type == 'url' ? 'selected' : '' }}>
                                                                    {{ __('Link') }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-3 col-md-3'>
                                                        <div class='mb-3 mt-2'>
                                                            <label class='form-label required'>{{ __('Label') }}</label>
                                                            <input class='lbl{{ $payments[$i]->id }} form-control'
                                                                name='label[]' type='text'
                                                                value="{{ $payments[$i]->label }}"
                                                                placeholder='{{ __('Label') }}...' required>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-4 col-md-4'>
                                                        <div class='mb-3 mt-2'>
                                                            <label class='form-label required'>{{ __('Content') }}</label>
                                                            <input class='textlbl{{ $payments[$i]->id }} form-control'
                                                                name='value[]' type="text"
                                                                value="{{ $payments[$i]->content }}"
                                                                placeholder='{{ __('Type something') }}...' required>
                                                            <small class="text-muted">{{ __('For example for UPI') }} :
                                                                <br>
                                                                {{ __('upi://pay?pn=YOUR_NAME(NOSPACE)&pa=YOUR_UPI_ID&cu=INR') }}
                                                                <br> ({{ __('For India Only') }})</small>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-1 col-md-1'>
                                                        <div class='mb-3 pt-1 mt-4'>
                                                            <button class='btn btn-transparent'
                                                                onclick='removePayment({{ $i }})'>
                                                                <i class='fa fa-times text-danger'></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endfor

                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="more-payments"></div>
                                <div class="col-lg-12">
                                    <button class="btn btn-primary" type="button" onclick="addPayment()">
                                        {{ __('Add One More Payments') }}
                                    </button>
                                </div>

                                <div class="col-md-4 col-xl-4 my-3">
                                    <div class="mb-3">
                                        <button class="btn btn-primary" type="submit">
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
    </div>

@endsection

@push('script')
    <script type="text/javascript" src="{{ asset('backend/js/fontawesome-iconpicker.min.js') }}"></script>
    <script>
        var count = {{ count($payments) }};

        function addPayment() {
            "use strict";
            if (count >= {{ $plan_details->no_of_payments }}) {
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
                var payments = "<div class='row' id=" + id +
                    "><div class='col-lg-2 col-md-2'><div class='mb-3 mt-2'><label class='form-label required'>{{ __('Icon') }}</label><div class='input-group'><input type='text' class='form-control' placeholder='{{ __('Choose Icon') }}' id='iconpick" +
                    id + "' onclick='openPicker(" + id +
                    ")' name='icon[]' required readonly></div></div></div><div class='col-lg-2 col-md-2'><div class='mb-3 mt-2'><label class='form-label required' for='type'>{{ __('Display type') }}</label><select name='type[]' id='type' class='type" +
                    id + " form-control' onchange='changeLabel(" + id +
                    ")'  required> <option value='' disabled selected>{{ __('Choose Type') }}</option><option value='text'>{{ __('Default') }}</option><option value='url'>{{ __('Link') }}</option></select></div></div><div class='col-lg-3 col-md-3'><div class='mb-3 mt-2'><label class='form-label required'>{{ __('Label') }}</label><input type='text' class='lbl" +
                    id +
                    " form-control' name='label[]' placeholder='{{ __('Label') }}...' required></div></div><div class='col-lg-4 col-md-4'><div class='mb-3 mt-2'><label class='form-label required'>{{ __('Content') }}</label><input type='text' class='textlbl" +
                    id +
                    " form-control' name='value[]' placeholder='{{ __('Type something') }}...' required><small class='text-muted'>{{ __('For example for UPI') }} : <br> {{ __('upi://pay?pn=YOUR_NAME(NOSPACE)&pa=YOUR_UPI_ID&cu=INR') }} <br> ({{ __('For India Only') }})</small></div></div><div class='col-lg-1 col-md-1'> <div class='mb-3 pt-1 mt-4'><button class='btn btn-transparent' onclick='removePayment(" +
                    id + ")'><i class='fa fa-times text-danger'></i></button></div></div></div>";
                $("#more-payments").append(payments).html();
            }
        }

        function removePayment(id) {
            "use strict";
            $("#" + id).remove();
            count--;
        }

        function getRandomInt() {
            min = Math.ceil(0);
            max = Math.floor(9999999999);
            return Math.floor(Math.random() * (max - min) + min); //The maximum is exclusive and the minimum is inclusive
        }

        function openPicker(id) {
            "use strict";
            $("#iconpick" + id).iconpicker({
                animation: true,
                hideOnSelect: true,
                placement: "inline",
                templates: {
                    popover: '<div class="iconpicker-popover popover position-absolute"><div class="arrow"></div>' +
                        '<div class="popover-title"></div><div class="popover-content"></div></div>',
                    iconpickerItem: '<a role="button" class="iconpicker-item"><i></i></a>'
                }
            });
        }

        function changeLabel(id) {
            "use strict";
            var label = 'Label';
            var textlabel = 'Type Something...';
            let lbl = document.querySelector('.lbl' + id);
            let textlbl = document.querySelector('.textlbl' + id);
            let type = document.querySelector('.type' + id).value;
            console.log(type);
            if (type == 'text') {
                label = `{{ 'Bank' }}`;
                textlabel = `{{ __('Your bank account details') }}`;
            } else if (type == 'url') {
                label = `{{ __('UPI or Other Payment Method') }}`;
                textlabel =
                    `{{ __('For ex: upi://pay?pn=YOUR_NAME(NOSPACE)&pa=YOUR_UPI_ID&cu=INR or https://rzp.io/i/nxrHnLJ') }}`;
            }

            lbl.placeholder = label;
            textlbl.placeholder = textlabel;
        }
    </script>
@endpush
