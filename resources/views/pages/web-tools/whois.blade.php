@extends('layouts.web', ['nav' => true, 'banner' => false, 'footer' => true, 'cookie' => true, 'setting' => true,
'title' => __('Whois Lookup - Web Tools')])

{{-- Check Google Adsense is "enabled" --}}
@section('custom-script')
@if ($settings->google_adsense_code != 'DISABLE_ADSENSE_ONLY')
{{-- AdSense code --}}
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client={{ $settings->google_adsense_code }}"
    crossorigin="anonymous"></script>
@endif
@endsection

@section('content')
<div>
    <section class="text-gray-700">
        <div class="container px-5 py-24 mx-auto">
            {{-- Page title --}}
            <div class="mb-2">
                <h1 class="text-3xl font-bold font-large title-font text-gray-900 mb-4">
                    {{ __('Whois Lookup') }}
                </h1>
            </div>

            {{-- Form --}}
            <form action="{{ route('web.result.whois.lookup')}}" method="post">
                @csrf

                {{-- Domain URL --}}
                <div class='mb-3 space-y-2 w-full'>
                    <label class='font-bold text-gray-600 py-2'>{{ __('Domain URL') }} <abbr title='required'>*</abbr></label>
                    <input placeholder='{{ __('Eg: https://domain.com') }}' class='appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4' required='required' value='{{ $domain ?? (old('domain') ?? '') }}' type='text' name='domain' id='domain'>
                </div>

                <button type="submit" class="lg:inline-block py-2 px-6 bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 text-lg text-white font-bold rounded-l-xl rounded-t-xl transition duration-200">{{ __('Search') }}</button>
            </form>

            {{-- Whois Result --}}
            @if(isset($results))
            <div class='flex flex-wrap lg:w-full sm:mx-auto sm:mb-2 lg:mt-12'>  
                <div class="rounded-xl border p-5 shadow-md w-full bg-white">
                    <div class="flex w-full items-center justify-between border-b pb-3">
                        <div class="flex items-center space-x-3">
                            <div class="text-lg font-bold text-slate-700">{{ __('Result') }}</div>
                        </div>
                        <div class="flex items-center space-x-8">
                            <button class="rounded-2xl border bg-neutral-100 px-3 py-1 font-semibold">{{ __('WHOIS') }}</button>
                        </div>
                    </div>

                    {{-- Check result is "empty" --}}
                    @if(empty($results))
                        {{ __('No results found.') }}
                    @else
                    {{-- Domain Name --}}
                    <div class="mt-4 mb-2">
                        <div class="mb-3 text-xl font-bold">{{ __('Domain Name') }}</div>
                        <div class="text-lg text-neutral-600"><img width="20" height="20" src="https://icons.duckduckgo.com/ip3/{{ $results->domainName }}.ico" alt="{{ $results->domainName }}">{{ $results->domainName }}</div>
                    </div>

                    {{-- Registrar Name --}}
                    <div class="mt-4 mb-2">
                        <div class="mb-3 text-xl font-bold">{{ __('Registrar Name') }}</div>
                        <div class="text-lg text-neutral-600">{{ __($results->registrar) }}</div>
                    </div>

                    {{-- Registrant name --}}
                    @if($results->owner)
                    <div class="mt-4 mb-2">
                        <div class="mb-3 text-xl font-bold">{{ __('Registrant name') }}</div>
                        <div class="text-lg text-neutral-600">{{ __($results->owner) }}</div>
                    </div>
                    @endif

                    {{-- Domain Created date --}}
                    <div class="mt-4 mb-2">
                        <div class="mb-3 text-xl font-bold">{{ __('Domain Created date') }}</div>
                        <div class="text-lg text-neutral-600">{{ __(':date at :time (UTC :offset)', ['date' =>
                            \Carbon\Carbon::createFromTimestamp($results->creationDate)->tz(Auth::user()->timezone
                            ?? config('app.timezone'))->format(__('Y-m-d')), 'time' =>
                            \Carbon\Carbon::createFromTimestamp($results->creationDate)->tz(Auth::user()->timezone
                            ?? config('app.timezone'))->format(__('H:i:s')), 'offset' =>
                            \Carbon\CarbonTimeZone::create((Auth::user()->timezone ??
                            config('app.timezone')))->toOffsetName()]) }}</div>
                    </div>

                    {{-- Domain Updated date --}}
                    <div class="mt-4 mb-2">
                        <div class="mb-3 text-xl font-bold">{{ __('Domain Updated date') }}</div>
                        <div class="text-lg text-neutral-600">{{ __(':date at :time (UTC :offset)', ['date' =>
                            \Carbon\Carbon::createFromTimestamp($results->updatedDate)->tz(Auth::user()->timezone
                            ?? config('app.timezone'))->format(__('Y-m-d')), 'time' =>
                            \Carbon\Carbon::createFromTimestamp($results->updatedDate)->tz(Auth::user()->timezone
                            ?? config('app.timezone'))->format(__('H:i:s')), 'offset' =>
                            \Carbon\CarbonTimeZone::create((Auth::user()->timezone ??
                            config('app.timezone')))->toOffsetName()]) }}</div>
                    </div>

                    {{-- Domain Expiration date --}}
                    <div class="mt-4 mb-2">
                        <div class="mb-3 text-xl font-bold">{{ __('Domain Expiration date') }}</div>
                        <div class="text-lg text-neutral-600">{{ __(':date at :time (UTC :offset)', ['date' =>
                            \Carbon\Carbon::createFromTimestamp($results->expirationDate)->tz(Auth::user()->timezone
                            ?? config('app.timezone'))->format(__('Y-m-d')), 'time' =>
                            \Carbon\Carbon::createFromTimestamp($results->expirationDate)->tz(Auth::user()->timezone
                            ?? config('app.timezone'))->format(__('H:i:s')), 'offset' =>
                            \Carbon\CarbonTimeZone::create((Auth::user()->timezone ??
                            config('app.timezone')))->toOffsetName()]) }}</div>
                    </div>

                    {{-- Domain Name servers --}}
                    <div class="mt-4 mb-2">
                        <div class="mb-3 text-xl font-bold">{{ __('Domain Name servers') }}</div>
                        <div class="text-lg text-neutral-600">
                            @foreach($results->nameServers as $serverName)
                            <div class="text-break {{ !$loop->first ? 'mt-1' : '' }}">
                                {{ $serverName }}
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- States --}}
                    <div class="mt-4 mb-2">
                        <div class="mb-3 text-xl font-bold">{{ __('States') }}</div>
                        <div class="text-lg text-neutral-600">
                            @foreach($results->states as $stateName)
                            <div class="text-break {{ !$loop->first ? 'mt-1' : '' }}">
                                {{ $stateName }}
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- WHOIS server name --}}
                    @if($results->whoisServer)
                    <div class="mt-4 mb-2">
                        <div class="mb-3 text-xl font-bold">{{ __('WHOIS server name') }}</div>
                        <div class="text-lg text-neutral-600">
                            {{ $results->whoisServer }}
                        </div>
                    </div>
                    @endif
                    @endif
                </div>
            </div>
            @endif
        </div>
    </section>
</div>
@endsection