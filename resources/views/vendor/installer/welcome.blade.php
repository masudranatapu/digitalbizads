@extends('vendor.installer.layouts.master')

@section('template_title')
    {{ trans('installer_messages.welcome.templateTitle') }}
@endsection

@section('title')
    {{ trans('installer_messages.welcome.title') }}
@endsection

@section('container')

    <p class="text-center">
        {{ trans('installer_messages.welcome.message') }}
    </p>
    <p class="text-center">
        <a href="{{ route('LaravelInstaller::requirements') }}" class="button btn btn-primary">
            {{ trans('installer_messages.welcome.next') }}
        </a>
    </p>
@endsection
