@extends('layouts.admin', ['header' => true, 'nav' => true, 'demo' => true])

@section('content')
<div class="page-wrapper">
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        {{ __('Overview') }}
                    </div>
                    <h2 class="page-title">
                        {{ __('Themes') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                @foreach ($themes as $theme)
                <div class="col-sm-4 col-lg-4">
                    <div class="card card-sm">
                        <img src="{{ asset('backend/img/vCards/'.$theme->theme_thumbnail) }}" class="card-img-top">
                        <div class="card-body">
                          <div class="d-flex align-items-center">
                            <span class="avatar me-3 rounded"><img src="{{ asset(auth::user()->profile_image == null ? 'profile.png' : auth::user()->profile_image) }}" /></span>
                            <div>
                              <div>{{ __($theme->theme_name) }}</div>
                              <div class="text-muted">{{ __($theme->theme_description) }}</div>
                            </div>
                            {{-- Upcoming --}}
                            {{-- <div class="ms-auto">
                                <a href="#" class="text-muted">
                                  <span class="badge bg-green">{{ $theme->theme_price }}</span>
                                </a>
                            </div> --}}
                          </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('admin.includes.footer')
</div>
@endsection
