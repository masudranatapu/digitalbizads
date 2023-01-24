@extends('vendor.installer.layouts.master')

@section('template_title')
    {{ trans('installer_messages.final.templateTitle') }}
@endsection

@section('title')
    {{ trans('installer_messages.final.title') }}
@endsection

@section('container')

    <div class="buttons">
        <a href="{{ url('/') }}" class="btn btn-primary">{{ trans('installer_messages.final.exit') }}</a>
    </div>

    <div class="hr-text hr-text-center mb-4 mt-4 hr-text-spaceless">{{ trans('installer_messages.final.log') }}</div>


    @if (session('message')['dbOutputLog'])
        <p><strong><small>{{ trans('installer_messages.final.migration') }}</small></strong></p>
        <pre><code>{{ session('message')['dbOutputLog'] }}</code></pre>
    @endif

    <p><strong><small>{{ trans('installer_messages.final.console') }}</small></strong></p>
    <pre><code>{{ $finalMessages }}</code></pre>

    <p><strong><small>{{ trans('installer_messages.final.log') }}</small></strong></p>
    <pre><code>{{ $finalStatusMessage }}</code></pre>

    <p><strong><small>{{ trans('installer_messages.final.env') }}</small></strong></p>
    <pre><code>{{ $finalEnvFile }}</code></pre>

    <div class="buttons">
        <a href="{{ url('/') }}" class="btn btn-primary">{{ trans('installer_messages.final.exit') }}</a>
    </div>

@endsection
