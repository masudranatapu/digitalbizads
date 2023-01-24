@extends('vendor.installer.layouts.master')

@section('template_title')
    {{ trans('installer_messages.environment.classic.templateTitle') }}
@endsection

@section('title')
    <i class="fa fa-code fa-fw" aria-hidden="true"></i> {{ trans('installer_messages.environment.classic.title') }}
@endsection

@section('container')

    <form method="post" action="{{ route('LaravelInstaller::environmentSaveClassic') }}">
        {!! csrf_field() !!}

        <textarea class="form-control" rows="10" name="envConfig" data-bs-toggle="autosize"
            placeholder=".env">{{ $envConfig }}</textarea>


        <div class="float-right mt-2 mb-2">
            <button class="btn btn-primary" type="submit">
                {!! trans('installer_messages.environment.classic.save') !!}
            </button>
        </div>
    </form>

    @if (!isset($environment['errors']))
        <div class="mt-1">
            <a class="float-right btn btn-primary" href="{{ route('LaravelInstaller::database') }}">
                {!! trans('installer_messages.environment.classic.install') !!}
            </a>
        </div>
    @endif

@endsection
