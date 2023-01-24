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
                        {{ __('WHOIS Lookup') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                {{-- Search Whois Lookup --}}
                <div class="col-sm-12 col-lg-12">
                    <form action="{{ route('user.result.whois-lookup') }}" method="post" class="card">
                        @csrf
                        <div class="card-body">

                            {{-- Failed --}}
                            @if (Session::has("failed"))
                            <div class="alert alert-important alert-danger alert-dismissible" role="alert">
                                <div class="d-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="alert-icon icon icon-tabler icon-tabler-alert-circle" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="12" r="9"></circle>
                                        <line x1="12" y1="8" x2="12" y2="12"></line>
                                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                    </svg>
                                    <div>
                                        {{Session::get('failed')}}
                                    </div>
                                </div>
                                <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
                            </div>
                            @endif

                            {{-- Success --}}
                            @if(Session::has("success"))
                            <div class="alert alert-important alert-success alert-dismissible" role="alert">
                                <div class="d-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="alert-icon icon icon-tabler icon-tabler-check" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 12l5 5l10 -10"></path>
                                    </svg>
                                    <div>
                                        {{Session::get('success')}}
                                    </div>
                                </div>
                                <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
                            </div>
                            @endif

                            <div class="row">
                                <div class="col-xl-10">
                                    <div class="row">
                                        {{-- Domain --}}
                                        <div class="col-md-10 col-xl-10">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Domain') }}</label>
                                                <input type="text" class="form-control" name="domain"
                                                    value="{{ $domain ?? (old('domain') ?? '') }}"
                                                    placeholder="{{ __('Eg: https://domain.com') }}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-xl-4 my-3">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-search" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <circle cx="10" cy="10" r="7"></circle>
                                                        <line x1="21" y1="21" x2="15" y2="15"></line>
                                                    </svg>
                                                    {{ __('Search') }}
                                                </button>
                                                <a href="{{ route('user.whois-lookup') }}" class="btn btn-dark">
                                                    {{ __('Reset') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                {{-- Result --}}
                @if(isset($results))
                <div class="card border-0 shadow-sm mt-3">
                    <div class="card-header align-items-center">
                        <div class="row">
                            <div class="col">
                                <div class="font-weight-medium py-1">{{ __('Result') }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if(empty($results))
                        {{ __('No results found.') }}
                        @else
                        <div class="list-group list-group-flush my-n3">
                            <div class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-12 col-lg-4 text-break text-muted">{{ __('Domain') }}</div>
                                    <div class="col-12 col-lg-8 text-break d-flex align-items-center">
                                        <img class="avatar avatar-sm"
                                            src="https://icons.duckduckgo.com/ip3/{{ $results->domainName }}.ico"
                                            rel="noreferrer" class="rounded">
                                        <span>{{ $results->domainName }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-12 col-lg-4 text-break text-muted">{{ __('Registrar Name') }}</div>
                                    <div class="col-12 col-lg-8 text-break">{{ $results->registrar }}</div>
                                </div>
                            </div>

                            @if($results->owner)
                            <div class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-12 col-lg-4 text-break text-muted">{{ __('Registrant Name') }}</div>
                                    <div class="col-12 col-lg-8 text-break">{{ $results->owner }}</div>
                                </div>
                            </div>
                            @endif

                            <div class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-12 col-lg-4 text-break text-muted">{{ __('Domain Created date') }}</div>
                                    <div class="col-12 col-lg-8 text-break">
                                        {{ __(':date at :time (UTC :offset)', ['date' =>
                                        \Carbon\Carbon::createFromTimestamp($results->creationDate)->tz(Auth::user()->timezone
                                        ?? config('app.timezone'))->format(__('Y-m-d')), 'time' =>
                                        \Carbon\Carbon::createFromTimestamp($results->creationDate)->tz(Auth::user()->timezone
                                        ?? config('app.timezone'))->format(__('H:i:s')), 'offset' =>
                                        \Carbon\CarbonTimeZone::create((Auth::user()->timezone ??
                                        config('app.timezone')))->toOffsetName()]) }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-12 col-lg-4 text-break text-muted">{{ __('Domain Updated date') }}</div>
                                    <div class="col-12 col-lg-8 text-break">
                                        {{ __(':date at :time (UTC :offset)', ['date' =>
                                        \Carbon\Carbon::createFromTimestamp($results->updatedDate)->tz(Auth::user()->timezone
                                        ?? config('app.timezone'))->format(__('Y-m-d')), 'time' =>
                                        \Carbon\Carbon::createFromTimestamp($results->updatedDate)->tz(Auth::user()->timezone
                                        ?? config('app.timezone'))->format(__('H:i:s')), 'offset' =>
                                        \Carbon\CarbonTimeZone::create((Auth::user()->timezone ??
                                        config('app.timezone')))->toOffsetName()]) }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-12 col-lg-4 text-break text-muted">{{ __('Domain Expiration date') }}</div>
                                    <div class="col-12 col-lg-8 text-break">
                                        {{ __(':date at :time (UTC :offset)', ['date' =>
                                        \Carbon\Carbon::createFromTimestamp($results->expirationDate)->tz(Auth::user()->timezone
                                        ?? config('app.timezone'))->format(__('Y-m-d')), 'time' =>
                                        \Carbon\Carbon::createFromTimestamp($results->expirationDate)->tz(Auth::user()->timezone
                                        ?? config('app.timezone'))->format(__('H:i:s')), 'offset' =>
                                        \Carbon\CarbonTimeZone::create((Auth::user()->timezone ??
                                        config('app.timezone')))->toOffsetName()]) }}
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-12 col-lg-4 text-break text-muted">{{ __('Domain Name servers') }}</div>
                                    <div class="col-12 col-lg-8 text-break">
                                        @foreach($results->nameServers as $serverName)
                                        <div class="text-break {{ !$loop->first ? 'mt-1' : '' }}">
                                            {{ $serverName }}
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-12 col-lg-4 text-break text-muted">{{ __('States') }}</div>
                                    <div class="col-12 col-lg-8 text-break">
                                        @foreach($results->states as $stateName)
                                        <div class="text-break {{ !$loop->first ? 'mt-1' : '' }}">
                                            {{ $stateName }}
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            @if($results->whoisServer)
                            <div class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col-12 col-lg-4 text-break text-muted">{{ __('WHOIS server') }}</div>
                                    <div class="col-12 col-lg-8 text-break">{{ $results->whoisServer }}</div>
                                </div>
                            </div>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Footer --}}
    @include('user.includes.footer')
</div>
@endsection