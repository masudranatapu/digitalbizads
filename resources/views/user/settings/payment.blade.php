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
                            {{ __('Biz Ad Card Subscriber') }}
                        </h2>
                    </div>
                    @if (!empty($subscriber) && $subscriber->count())
                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                            <div class="dropdown">

                                <a type="button" href="{{ route('user.card.subscriber.export', ['card' => $cardId]) }}">
                                    <button type="button" class="btn btn btn-primary">
                                        <i class="fas fa-file-excel"></i> &ensp;
                                        {{ __('Export To Excel') }}
                                    </button>
                                </a>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <div class="col-sm-12 col-lg-12 d-none d-md-block">
                        <div class="card">
                            <div class="accordion-body pt-0">
                                <form action="{{ route('user.setting.payment.update') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <h2 class="page-title my-3">
                                            Paypal Settings
                                        </h2>
                                        {{-- <div class="col-md-4 col-xl-4">
                                            <div class="mb-3">
                                                <label class="form-label required">Mode</label>
                                                <select type="text" class="form-select"
                                                    placeholder="Select a payment mode" id="select-tags-advanced"
                                                    name="paypal_mode" required="">
                                                    <option value="sandbox">
                                                        Sandbox</option>
                                                    <option value="live">
                                                        Live</option>
                                                </select>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required">Client Key</label>
                                                <input type="text" class="form-control" name="paypal_client_key"
                                                    value="{{ Auth::user()->paypal_public_key ?? '' }}"
                                                    placeholder="Client Key...">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required">Secret</label>
                                                <input type="text" class="form-control" name="paypal_secret"
                                                    value="{{ Auth::user()->paypal_public_key ?? '' }}"
                                                    placeholder="Secret...">
                                            </div>
                                        </div>
                                        <h2 class="page-title my-3">
                                            Stripe Settings
                                        </h2>

                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required">Publishable Key</label>
                                                <input type="text" class="form-control" name="stripe_publishable_key"
                                                    value="{{ Auth::user()->stripe_public_key ?? '' }}"
                                                    placeholder="Publishable Key...">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required">Secret</label>
                                                <input type="text" class="form-control" name="stripe_secret"
                                                    value="{{ Auth::user()->stripe_secret_key ?? '' }}"
                                                    placeholder="Secret...">
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <div class="d-flex">
                                                <button type="submit" class="btn btn-primary btn-md ms-auto">
                                                    Update
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
        </div>
        @include('user.includes.footer')
    </div>
@endsection
