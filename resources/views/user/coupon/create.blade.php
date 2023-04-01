@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])
@section('setting-nav', 'active')

@push('css')
    <link href="{{ asset('assets/css/jquery-ui.css') }}" rel="stylesheet">
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
                            {{ __('Create Coupon') }}
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="dropdown">
                            <a type="button" href="{{ route('user.coupon.index') }}">
                                <button class="btn btn btn-primary" type="button">
                                    {{ __('Back') }}
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
                            <form action="{{ route('user.coupon.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-label" for="">Name <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('name') border-danger @enderror"
                                                name="name" type="text" value="{{ old('name') }}" required
                                                placeholder="Name" autocomplete="off">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="">Code<span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control @error('coupon_code') border-danger @enderror"
                                                name="coupon_code" type="text" value="{{ old('coupon_code') }}" required
                                                placeholder="Coupon code" autocomplete="off">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="">Discount Type</label>
                                            <select class="form-control @error('type') border-danger @enderror"
                                                name="type" required>

                                                <option value="amount" {{ old('type') == 'amount' ? 'selected' : '' }}>
                                                    $
                                                </option>
                                                <option value="percent" {{ old('type') == 'percent' ? 'selected' : '' }}>
                                                    %
                                                </option>
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label" for="">Amount </label>
                                            <input class="form-control @error('amount') border-danger @enderror"
                                                name="amount" type="number" value="{{ old('amount') }}"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                min="0" required placeholder="Amount" autocomplete="off" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label" for="">Status </label>
                                            <select class="form-control @error('status') border-danger @enderror"
                                                name="status" required>

                                                <option value="1" {{ old('status') ? 'selected' : '' }}>
                                                    Active
                                                </option>
                                                <option value="0" {{ !old('status') ? 'selected' : '' }}>Inactive
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="from_date">Valid Form</label>
                                            <input class="form-control @error('from_date') border-danger @enderror"
                                                id="from_date" name="from_date" type="text"
                                                value="{{ old('from_date') }}" required placeholder="Valid form">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="">Expire Date</label>
                                            <input class="form-control @error('to_date') border-danger @enderror"
                                                id="to_date" name="to_date" type="text" value="{{ old('to_date') }}"
                                                required placeholder="Expire Date">
                                        </div>
                                        <div class="col-md-12 text-center mt-4">
                                            <button class="btn btn-info" type="submit">Create</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- mobile  --}}
                    <div
                        class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-block d-sm-block d-md-none d-lg-none d-xl-none">
                        <div class="row">
                            <div class="">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row row-deck row-cards">
                                            <div class="col-sm-12 col-lg-12">
                                                <form action="{{ route('user.coupon.store') }}" method="POST">
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label class="form-label" for="">Name <span
                                                                        class="text-danger">*</span></label>
                                                                <input
                                                                    class="form-control @error('name') border-danger @enderror"
                                                                    name="name" type="text"
                                                                    value="{{ old('name') }}" required
                                                                    placeholder="Name" autocomplete="off">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label" for="">Code<span
                                                                        class="text-danger">*</span></label>
                                                                <input
                                                                    class="form-control @error('coupon_code') border-danger @enderror"
                                                                    name="coupon_code" type="text"
                                                                    value="{{ old('coupon_code') }}" required
                                                                    placeholder="Coupon code" autocomplete="off">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label" for="">Discount
                                                                    Type</label>
                                                                <select
                                                                    class="form-control @error('type') border-danger @enderror"
                                                                    name="type" required>

                                                                    <option value="amount"
                                                                        {{ old('type') == 'amount' ? 'selected' : '' }}>
                                                                        $
                                                                    </option>
                                                                    <option value="percent"
                                                                        {{ old('type') == 'percent' ? 'selected' : '' }}>
                                                                        %
                                                                    </option>
                                                                </select>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label class="form-label" for="">Amount </label>
                                                                <input
                                                                    class="form-control @error('amount') border-danger @enderror"
                                                                    name="amount" type="number"
                                                                    value="{{ old('amount') }}"
                                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                                    min="0" required placeholder="Amount"
                                                                    autocomplete="off">
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label class="form-label" for="">Status </label>
                                                                <select
                                                                    class="form-control @error('status') border-danger @enderror"
                                                                    name="status" required>

                                                                    <option value="1"
                                                                        {{ old('status') ? 'selected' : '' }}>
                                                                        Active
                                                                    </option>
                                                                    <option value="0"
                                                                        {{ !old('status') ? 'selected' : '' }}>Inactive
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label" for="from_date">Valid
                                                                    Form</label>
                                                                <input
                                                                    class="form-control @error('from_date') border-danger @enderror"
                                                                    id="mobile_from_date" name="from_date" type="text"
                                                                    value="{{ old('from_date') }}" required
                                                                    placeholder="Valid form">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label" for="">Expire
                                                                    Date</label>
                                                                <input
                                                                    class="form-control @error('to_date') border-danger @enderror"
                                                                    id="mobile_to_date" name="to_date" type="text"
                                                                    value="{{ old('to_date') }}" required
                                                                    placeholder="Expire Date">
                                                            </div>
                                                            <div class="col-md-12 text-center mt-4">
                                                                <button class="btn btn-info"
                                                                    type="submit">Create</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @include('user.includes.footer')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('user.includes.footer')
    </div>
@endsection

@push('script')
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script>
        $(function() {
            $("#from_date").datepicker({
                dateFormat: "dd-mm-yy",
                altFormat: "yy-mm-dd",
                onSelect: function() {
                    $('#to_date').datepicker('option', 'minDate', $("#from_date").datepicker(
                        "getDate"));
                }
            }).datepicker("setDate", new Date());
            $("#to_date").datepicker({
                dateFormat: "dd-mm-yy",
                altFormat: "yy-mm-dd",
                minDate: $("#from_date").datepicker("getDate"),
            });
        });
        $(function() {
            $("#mobile_from_date").datepicker({
                dateFormat: "dd-mm-yy",
                altFormat: "yy-mm-dd",
                onSelect: function() {
                    $('#mobile_to_date').datepicker('option', 'minDate', $("#mobile_from_date")
                        .datepicker(
                            "getDate"));
                }
            }).datepicker("setDate", new Date());
            $("#mobile_to_date").datepicker({
                dateFormat: "dd-mm-yy",
                altFormat: "yy-mm-dd",
                minDate: $("#mobile_from_date").datepicker("getDate"),
            });
        });
    </script>
@endpush
