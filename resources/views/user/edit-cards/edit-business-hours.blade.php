@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])

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
                            {{ __('Business Hours') }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <div class="col-sm-12 col-lg-12">
                        <form action="{{ route('user.update.business.hours', Request::segment(3)) }}" method="post"
                            class="card">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="row">

                                            <h2 class="page-title my-3">
                                                {{ __('Always Open') }}
                                            </h2>

                                            <div class="row">
                                                <div class="col-md-3 col-xl-3">
                                                    <div class="mb-3">
                                                        <div class="form-label">{{ __('24 Hours') }}</div>
                                                        <label class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="always_open">
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-3 col-xl-3">

                                                    <div class="mb-3">
                                                        <div class="form-label">{{ __('Hide Business Hours') }}</div>
                                                        <label class="form-check form-switch">
                                                            <input id="display-hrs" class="form-check-input" type="checkbox"
                                                                onchange="displayBusiness()" name="is_display">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="business-hrs" class="row">

                                                <!-- Monday -->
                                                <div class="col-md-3 col-xl-3">
                                                    <div class="mb-3">
                                                        <h2 class="page-title my-3">
                                                            {{ __('Monday') }}
                                                        </h2>
                                                        <div class="mb-3">
                                                            <div class="form-label">{{ __('Closed') }}</div>
                                                            <label class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                onchange="MondayBusiness()" name="monday_closed" {{ $business_hrs['monday_status'] == "Closed" ? 'checked' : ''}}>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div id="monday-business">
                                                        <div class="mb-3">
                                                            <input type="time" class="form-control" name="monday_open"
                                                                placeholder="{{ __('Opening Time') }}..." value="{{ $business_hrs['monday_open'] }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="time" class="form-control" name="monday_closing"
                                                                placeholder="{{ __('Closing Time') }}..." value="{{ $business_hrs['monday_close'] }}">
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Tuesday -->
                                                <div class="col-md-3 col-xl-3">
                                                    <div class="mb-3">
                                                        <h2 class="page-title my-3">
                                                            {{ __('Tuesday') }}
                                                        </h2>
                                                        <div class="mb-3">
                                                            <div class="form-label">{{ __('Closed') }}</div>
                                                            <label class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                onchange="TuesdayBusiness()" name="tuesday_closed" {{ $business_hrs['tues_status'] == "Closed" ? 'checked' : ''}}>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div id="tuesday-business">
                                                        <div class="mb-3">
                                                            <input type="time" class="form-control" name="tuesday_open"
                                                                placeholder="{{ __('Opening Time') }}..." value="{{ $business_hrs['tuesday_open'] }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="time" class="form-control" name="tuesday_closing"
                                                                placeholder="{{ __('Closing Time') }}..." value="{{ $business_hrs['tuesday_close'] }}">
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Wednesday -->
                                                <div class="col-md-3 col-xl-3">
                                                    <div class="mb-3">
                                                        <h2 class="page-title my-3">
                                                            {{ __('Wednesday') }}
                                                        </h2>
                                                        <div class="mb-3">
                                                            <div class="form-label">{{ __('Closed') }}</div>
                                                            <label class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                onchange="WednesdayBusiness()" name="wednesday_closed" {{ $business_hrs['wed_status'] == "Closed" ? 'checked' : ''}}>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div id="wednesday-business">
                                                        <div class="mb-3">
                                                            <input type="time" class="form-control" name="wednesday_open"
                                                                placeholder="{{ __('Opening Time') }}..." value="{{ $business_hrs['wednesday_open'] }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="time" class="form-control" name="wednesday_closing"
                                                                placeholder="{{ __('Closing Time') }}..." value="{{ $business_hrs['wednesday_close'] }}">
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Thursday -->
                                                <div class="col-md-3 col-xl-3">
                                                    <div class="mb-3">
                                                        <h2 class="page-title my-3">
                                                            {{ __('Thursday') }}
                                                        </h2>
                                                        <div class="mb-3">
                                                            <div class="form-label">{{ __('Closed') }}</div>
                                                            <label class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                onchange="ThursdayBusiness()" name="thursday_closed" {{ $business_hrs['thurs_status'] == "Closed" ? 'checked' : ''}}>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div id="thursday-business">
                                                        <div class="mb-3">
                                                            <input type="time" class="form-control" name="thursday_open"
                                                                placeholder="{{ __('Opening Time') }}..." value="{{ $business_hrs['thursday_open'] }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="time" class="form-control" name="thursday_closing"
                                                                placeholder="{{ __('Closing Time') }}..." value="{{ $business_hrs['thursday_close'] }}">
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Friday -->
                                                <div class="col-md-3 col-xl-3">
                                                    <div class="mb-3">
                                                        <h2 class="page-title my-3">
                                                            {{ __('Friday') }}
                                                        </h2>
                                                        <div class="mb-3">
                                                            <div class="form-label">{{ __('Closed') }}</div>
                                                            <label class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                onchange="FridayBusiness()" name="friday_closed" {{ $business_hrs['friday_status'] == "Closed" ? 'checked' : ''}}>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div id="friday-business">
                                                        <div class="mb-3">
                                                            <input type="time" class="form-control" name="friday_open"
                                                                placeholder="{{ __('Opening Time') }}..." value="{{ $business_hrs['friday_open'] }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="time" class="form-control" name="friday_closing"
                                                                placeholder="{{ __('Closing Time') }}..." value="{{ $business_hrs['friday_close'] }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Saturday -->
                                                <div class="col-md-3 col-xl-3">
                                                    <div class="mb-3">
                                                        <h2 class="page-title my-3">
                                                            {{ __('Saturday') }}
                                                        </h2>
                                                        <div class="mb-3">
                                                            <div class="form-label">{{ __('Closed') }}</div>
                                                            <label class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                onchange="SaturdayBusiness()" name="saturday_closed" {{ $business_hrs['saturday_status'] == "Closed" ? 'checked' : ''}}>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div id="saturday-business">
                                                        <div class="mb-3">
                                                            <input type="time" class="form-control" name="saturday_open"
                                                                placeholder="{{ __('Opening Time') }}..." value="{{ $business_hrs['saturday_open'] }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="time" class="form-control" name="saturday_closing"
                                                                placeholder="{{ __('Closing Time') }}..." value="{{ $business_hrs['saturday_close'] }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Sunday -->
                                                <div class="col-md-3 col-xl-3">
                                                    <div class="mb-3">
                                                        <h2 class="page-title my-3">
                                                            {{ __('Sunday') }}
                                                        </h2>
                                                        <div class="mb-3">
                                                            <div class="form-label">{{ __('Closed') }}</div>
                                                            <label class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox"
                                                                onchange="SundayBusiness()" name="sunday_closed" {{ $business_hrs['sunday_status'] == "Closed" ? 'checked' : ''}}>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div id="sunday-business">
                                                        <div class="mb-3">
                                                            <input type="time" class="form-control" name="sunday_open"
                                                                placeholder="{{ __('Opening Time') }}..." value="{{ $business_hrs['sunday_open'] }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="time" class="form-control" name="sunday_closing"
                                                                placeholder="{{ __('Closing Time') }}..." value="{{ $business_hrs['sunday_close'] }}">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-12 my-3 row">
                                                <div class="mb-3">

                                                    <button type="submit" class="btn float-right btn-primary">
                                                        {{ __('Save') }}
                                                    </button>
                                                </div>

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
    </div>


@endsection



@push('custom-js')
    <script>
        function displayBusiness() {
            "use strict";
            var disp = $('input[name="is_display"]:checked').length;
            console.log(disp);
            if (disp == 0) {
                $("#business-hrs").show();
            } else {
                $("#business-hrs").hide();
            }
        }

        function MondayBusiness() {
            "use strict";
            var monday = $('input[name="monday_closed"]:checked').length;
            console.log(monday);
            if (monday == 0) {
                $("#monday-business").show();
            } else {
                $("#monday-business").hide();

            }
        }

        function TuesdayBusiness() {
            "use strict";
            var tuesday = $('input[name="tuesday_closed"]:checked').length;
            console.log(tuesday);
            if (tuesday == 0) {
                $("#tuesday-business").show();
            } else {
                $("#tuesday-business").hide();

            }
        }

        function WednesdayBusiness() {
            "use strict";
            var wednesday = $('input[name="wednesday_closed"]:checked').length;
            console.log(wednesday);
            if (wednesday == 0) {
                $("#wednesday-business").show();
            } else {
                $("#wednesday-business").hide();

            }
        }

        function ThursdayBusiness() {
            "use strict";
            var thursday = $('input[name="thursday_closed"]:checked').length;
            console.log(thursday);
            if (thursday == 0) {
                $("#thursday-business").show();
            } else {
                $("#thursday-business").hide();

            }
        }

        function FridayBusiness() {
            "use strict";
            var friday = $('input[name="friday_closed"]:checked').length;
            console.log(friday);
            if (friday == 0) {
                $("#friday-business").show();
            } else {
                $("#friday-business").hide();

            }
        }

        function SaturdayBusiness() {
            "use strict";
            var saturday = $('input[name="saturday_closed"]:checked').length;
            console.log(saturday);
            if (saturday == 0) {
                $("#saturday-business").show();
            } else {
                $("#saturday-business").hide();

            }
        }

        function SundayBusiness() {
            "use strict";
            var sunday = $('input[name="sunday_closed"]:checked').length;
            console.log(sunday);
            if (sunday == 0) {
                $("#sunday-business").show();
            } else {
                $("#sunday-business").hide();

            }
        }
    </script>
@endpush
