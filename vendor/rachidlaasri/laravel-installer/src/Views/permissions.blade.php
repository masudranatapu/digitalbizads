@extends('vendor.installer.layouts.master')

@section('template_title')
    {{ trans('installer_messages.permissions.templateTitle') }}
@endsection

@section('title')
    <i class="fa fa-key fa-fw" aria-hidden="true"></i>
    {{ trans('installer_messages.permissions.title') }}
@endsection

@section('container')

    <ul class="list-unstyled space-y-1 font-weight-bold">
        @foreach ($permissions['permissions'] as $permission)
            <li class="list__item list__item--permissions">

                @if ($permission['isSet'])
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5 12l5 5l10 -10"></path>
                    </svg>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-red" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                @endif

                {{ $permission['folder'] }}
                <span>
                    {{ $permission['permission'] }}
                </span>
            </li>
        @endforeach
    </ul>

    @if (!isset($permissions['errors']))
        <div>
            <a href="{{ route('LaravelInstaller::environment') }}" class="btn btn-primary">
                {{ trans('installer_messages.permissions.next') }}
                <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
            </a>
        </div>
    @endif

@endsection
