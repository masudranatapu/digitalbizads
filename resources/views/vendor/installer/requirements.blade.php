@extends('vendor.installer.layouts.master')

@section('template_title')
    {{ trans('installer_messages.requirements.templateTitle') }}
@endsection

@section('title')
    <i class="fa fa-list-ul fa-fw" aria-hidden="true"></i>
    {{ trans('installer_messages.requirements.title') }}
@endsection

@section('container')

    @foreach ($requirements['requirements'] as $type => $requirement)

        <ul class="list-unstyled space-y-1 text-uppercase">
            <li>
                @if ($phpSupportInfo['supported'])
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
                <strong>{{ ucfirst($type) }}</strong>

                @if ($type == 'php')
                    <strong>
                        <small>
                            (version {{ $phpSupportInfo['minimum'] }} required)
                        </small>
                    </strong>
                    <span class="float-right">
                        <strong>
                            {{ $phpSupportInfo['current'] }}
                        </strong>

                        @if ($phpSupportInfo['supported'])
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 12l5 5l10 -10"></path>
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-red" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        @endif

                    </span>
                @endif

            </li>

            @foreach ($requirements['requirements'][$type] as $extention => $enabled)
                <li>


                    @if ($enabled)
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 12l5 5l10 -10"></path>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-red" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    @endif

                    {{ $extention }}

                </li>
            @endforeach

        </ul>
    @endforeach


    @if (!isset($requirements['errors']) && $phpSupportInfo['supported'])
        <div>
            <a class="btn btn-primary" href="{{ route('LaravelInstaller::permissions') }}">
                {{ trans('installer_messages.requirements.next') }}
            </a>
        </div>
    @endif

@endsection
