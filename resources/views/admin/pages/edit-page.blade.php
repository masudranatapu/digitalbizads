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
                    <h2 class="mb-3 page-title">
                        {{ __('Edit Page') }}
                    </h2>
              </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-sm-12 col-lg-12">
                    <form action="{{ route('admin.save.page', Request::segment(3)) }}" method="post"
                        enctype="multipart/form-data" class="card">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                @for ($i = 0; $i < count($sections); $i++)
                                <div class="col-xl-4">
                                    <div id="section{{ $i }}" class="row">
                                        <div class="col-md-12 col-xl-12">
                                            <div class="mb-3">
                                                <label class="form-label">{{ ucfirst(str_replace('_', ' ', __($sections[$i]->section_title))) }}</label>
                                                <textarea rows="3" cols="10" class="form-control" name="section{{ $i }}"
                                                    data-bs-toggle="autosize" placeholder="{{ ucfirst(str_replace('_', ' ', __($sections[$i]->section_title))) }}">{{ $sections[$i]->section_content }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endfor
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('admin.includes.footer')
</div>
@endsection
