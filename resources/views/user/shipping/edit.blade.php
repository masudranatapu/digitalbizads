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
                            {{ __('Edit shipping area') }}
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="dropdown">
                            <a type="button" href="{{ route('user.shipping_area.index') }}">
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
                            <form action="{{ route('user.shipping_area.update', $shippingarea->id) }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">Area Name <span class="text-danger">*</span></label>
                                            <input class="form-control @error('name') is-invalid @enderror" name="name"
                                                type="text" value="{{ $shippingarea->name }}" required
                                                placeholder="Area name" autocomplete="off">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Amounts
                                                ({{ $currency_symbol }})</label>
                                            <input class="form-control @error('amount') is-invalid @enderror" name="amount"
                                                type="number" value="{{ $shippingarea->amount }}" min="0" required
                                                placeholder="Amount" autocomplete="off">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Status </label>
                                            <select class="form-control @error('status') is-invalid @enderror"
                                                name="status" required>
                                                <option class="d-none">Active</option>
                                                <option value="1" @if ($shippingarea->status == 1) selected @endif>
                                                    Active</option>
                                                <option value="0" @if ($shippingarea->status == 0) selected @endif>
                                                    Inactive</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 text-center mt-4">
                                            <button class="btn btn-info" type="submit">Update</button>
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
                                                <form action="{{ route('user.shipping_area.update', $shippingarea->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label for="">Area Name <span
                                                                        class="text-danger">*</span></label>
                                                                <input
                                                                    class="form-control @error('name') is-invalid @enderror"
                                                                    name="name" type="text"
                                                                    value="{{ $shippingarea->name }}" required
                                                                    placeholder="Area name" autocomplete="off">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="">Amounts
                                                                    ({{ $currency_symbol }})</label>

                                                                <input
                                                                    class="form-control @error('amount') is-invalid @enderror"
                                                                    name="amount" type="number"
                                                                    value="{{ $shippingarea->amount }}" min="0"
                                                                    required placeholder="Amount" autocomplete="off">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="">Status </label>
                                                                <select
                                                                    class="form-control @error('status') is-invalid @enderror"
                                                                    name="status" required>
                                                                    <option class="d-none">Active</option>
                                                                    <option value="1"
                                                                        @if ($shippingarea->status == 1) selected @endif>
                                                                        Active</option>
                                                                    <option value="0"
                                                                        @if ($shippingarea->status == 0) selected @endif>
                                                                        Inactive</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12 text-center mt-4">
                                                                <button class="btn btn-info" type="submit">Update</button>
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
