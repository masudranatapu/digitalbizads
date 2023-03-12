@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])
@section('setting-nav', 'active')


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
                            {{ __('Tax Setting Create') }}
                        </h2>
                    </div>

                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="dropdown">

                            <a href="{{ route('user.setting.tax') }}" class="btn btn btn-primary">
                                <i class="fas fa-arrow-left"></i> &ensp;
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
                    <div class="col-sm-12 col-lg-12 d-none d-md-block">
                        <div class="card">

                            <div class="card-body">
                                <form action="{{ route('user.setting.tax.store') }}" method="post">
                                    @csrf
                                    <div class="row">

                                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="tax" class="form-label required">State Name</label>
                                                <input type="text" class="form-control" name="state_name" id="state_name"
                                                    placeholder="State name" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            <div class="form-group">


                                                <label for="type" class="form-label">Select Type</label>
                                                <select name="type" id="" class="form-control" required>
                                                    <option value="" class="d-none" selected>Select Type</option>
                                                    <option value="amount">$</option>
                                                    <option value="percentage">%</option>
                                                </select>


                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="amount" class="form-label">Amount</label>
                                                <input type="number" class="form-control" name="amount" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2 text-center">
                                            <button class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-block d-sm-block d-md-none d-lg-none d-xl-none">
            <div class="row">


                <div class="">
                    <div class="card">
                        <div class="card-body">
                            <div class="row row-deck row-cards">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="card">

                                        <div class="card-body">
                                            <form action="{{ route('user.setting.tax.store') }}" method="post">
                                                @csrf
                                                <div class="row">

                                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                        <div class="form-group">
                                                            <label for="tax" class="form-label required">State
                                                                Name</label>
                                                            <input type="text" class="form-control" name="state_name"
                                                                id="state_name" placeholder="State name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                        <div class="form-group">


                                                            <label for="type" class="form-label">Select Type</label>
                                                            <select name="type" id="" class="form-control"
                                                                required>
                                                                <option value="" class="d-none" selected>Select
                                                                    Type</option>
                                                                <option value="amount">$</option>
                                                                <option value="percentage">%</option>
                                                            </select>


                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                        <div class="form-group">
                                                            <label for="amount" class="form-label">Amount</label>
                                                            <input type="number" class="form-control" name="amount"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2 text-center">
                                                        <button class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        @include('user.includes.footer')
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
