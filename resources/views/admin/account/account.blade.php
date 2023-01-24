@extends('layouts.admin', ['header' => true, 'nav' => true, 'demo' => true])

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
                        {{ __('My Account') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card">
                            <div class="card-body p-4 text-center">
                                <span class="avatar avatar-xl mb-3 bg-white">
                                    <img src="{{ asset(auth::user()->profile_image == null ? 'backend/img/favicon.png' : auth::user()->profile_image) }}" alt="{{ auth::user()->name }}">
                                </span>
                                <h3 class="m-0 mb-1">{{ __($account_details->name) }}</h3>
                                <div class="text-muted">
                                    {{ $account_details->email == '' ? __('Not Available') : $account_details->email }}
                                </div>
                                <div class="mt-3">
                                    <span
                                        class="badge bg-green-lt">{{ __($account_details->role_id == 1 ? __('Administrator') : '') }}</span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <a href="{{ route('admin.edit.account') }}" class="card-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler me-2 icon-tabler-edit" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"></path>
                                        <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"></path>
                                        <line x1="16" y1="5" x2="19" y2="8"></line>
                                    </svg>
                                    {{ __('Edit') }}</a>
                                <a href="{{ route('admin.change.password') }}" class="card-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler me-2 icon-tabler-key" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="8" cy="15" r="4"></circle>
                                        <line x1="10.85" y1="12.15" x2="19" y2="4"></line>
                                        <line x1="18" y1="5" x2="20" y2="7"></line>
                                        <line x1="15" y1="8" x2="17" y2="10"></line>
                                    </svg>
                                    {{ __('Change Password') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.includes.footer')
</div>
@endsection
