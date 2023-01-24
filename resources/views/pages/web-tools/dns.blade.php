@extends('layouts.web', ['nav' => true, 'banner' => false, 'footer' => true, 'cookie' => true, 'setting' => true,
'title' => __('DNS Lookup - Web Tools')])

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
                    {{ __('DNS Lookup') }}
                </h1>
            </div>

            {{-- Form --}}
            <form action="{{ route('web.result.dns.lookup')}}" method="post">
                @csrf

                {{-- Domain URL --}}
                <div class='mb-3 space-y-2 w-full'>
                    <label class='font-bold text-gray-600 py-2'>{{ __('Domain URL') }} <abbr title='required'>*</abbr></label>
                    <input placeholder='{{ __('Eg: https://domain.com') }}' class='appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4' required='required' value='{{ $domain ?? (old('domain') ?? '') }}' type='text' name='domain' id='domain'>
                </div>

                <button type="submit" class="lg:inline-block py-2 px-6 bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 text-lg text-white font-bold rounded-l-xl rounded-t-xl transition duration-200">{{ __('Search') }}</button>
            </form>

            {{-- DNS Result --}}
            @if(isset($results))
                <div class='flex flex-wrap lg:w-full sm:mx-auto sm:mb-2 lg:mt-12'>  
                    <div class="rounded-xl border p-5 shadow-md w-full bg-white">
                        <div class="flex w-full items-center justify-between border-b pb-3">
                            <div class="flex items-center space-x-3">
                                <div class="text-lg font-bold text-slate-700">{{ __('Result') }}</div>
                            </div>
                            <div class="flex items-center space-x-8">
                                <button class="rounded-2xl border bg-neutral-100 px-3 py-1 font-semibold">{{ __('DNS') }}</button>
                            </div>
                        </div>
                    
                        @if(empty($results))
                            {{ __('No results found.') }}
                        @else
                            {{-- A Record --}}
                            <div class="mt-4 mb-2">
                                <div class="mb-3 text-xl font-bold">{{ __('A Record') }}</div>
                                @foreach($results as $result)
                                @if(strtolower($result['type']) == 'a')
                                <div class="text-lg text-neutral-600">{{ __('Type') }} : {{ $result['type'] }}</div>
                                <div class="text-lg text-neutral-600">{{ __('Hostname') }} : {{ $result['host'] }}</div>
                                <div class="text-lg text-neutral-600">{{ __('IP') }} : {{ $result['ip'] }}</div>
                                <div class="text-lg text-neutral-600 mb-3">{{ __('TTL') }} : {{ $result['ttl'] }}</div>
                                @endif
                                @endforeach
                            </div>

                            {{-- AAAA Record --}}
                            <div class="mt-4 mb-2">
                                <div class="mb-3 text-xl font-bold">{{ __('AAAA Record') }}</div>
                                @foreach($results as $result)
                                @if(strtolower($result['type']) == 'aaaa')
                                <div class="text-lg text-neutral-600">{{ __('Type') }} : {{ $result['type'] }}</div>
                                <div class="text-lg text-neutral-600">{{ __('Hostname') }} : {{ $result['host'] }}</div>
                                <div class="text-lg text-neutral-600">{{ __('IPv6') }} : {{ $result['ipv6'] }}</div>
                                <div class="text-lg text-neutral-600 mb-3">{{ __('TTL') }} : {{ $result['ttl'] }}</div>
                                @endif
                                @endforeach
                            </div>

                            {{-- CNAME Record --}}
                            <div class="mt-4 mb-2">
                                <div class="mb-3 text-xl font-bold">{{ __('CNAME Record') }}</div>
                                @foreach($results as $result)
                                @if(strtolower($result['type']) == 'cname')
                                <div class="text-lg text-neutral-600">{{ __('Type') }} : {{ $result['type'] }}</div>
                                <div class="text-lg text-neutral-600">{{ __('Hostname') }} : {{ $result['host'] }}</div>
                                <div class="text-lg text-neutral-600">{{ __('Target') }} : {{ $result['target'] }}</div>
                                <div class="text-lg text-neutral-600 mb-3">{{ __('TTL') }} : {{ $result['ttl'] }}</div>
                                @endif
                                @endforeach
                            </div>

                            {{-- MX Record --}}
                            <div class="mt-4 mb-2">
                                <div class="mb-3 text-xl font-bold">{{ __('MX Record') }}</div>
                                @foreach($results as $result)
                                @if(strtolower($result['type']) == 'mx')
                                <div class="text-lg text-neutral-600">{{ __('Type') }} : {{ $result['type'] }}</div>
                                <div class="text-lg text-neutral-600">{{ __('Hostname') }} : {{ $result['host'] }}</div>
                                <div class="text-lg text-neutral-600">{{ __('Target') }} : {{ $result['target'] }}</div>
                                <div class="text-lg text-neutral-600">{{ __('Priority') }} : {{ $result['pri'] }}</div>
                                <div class="text-lg text-neutral-600 mb-3">{{ __('TTL') }} : {{ $result['ttl'] }}</div>
                                @endif
                                @endforeach
                            </div>

                            {{-- TXT Record --}}
                            <div class="mt-4 mb-2">
                                <div class="mb-3 text-xl font-bold">{{ __('TXT Record') }}</div>
                                @foreach($results as $result)
                                @if(strtolower($result['type']) == 'txt')
                                <div class="text-lg text-neutral-600">{{ __('Type') }} : {{ $result['type'] }}</div>
                                <div class="text-lg text-neutral-600">{{ __('Hostname') }} : {{ $result['host'] }}</div>
                                @foreach($result['entries'] as $entry)
                                <div class="text-lg text-neutral-600 {{ !$loop->first ? 'mt-1' : '' }}">{{ __('Entries') }} : {{ $entry }}</div>
                                @endforeach
                                <div class="text-lg text-neutral-600 mb-3">{{ __('TTL') }} : {{ $result['ttl'] }}</div>
                                @endif
                                @endforeach
                            </div>

                            {{-- NS Record --}}
                            <div class="mt-4 mb-2">
                                <div class="mb-3 text-xl font-bold">{{ __('NS Record') }}</div>
                                @foreach($results as $result)
                                @if(strtolower($result['type']) == 'ns')
                                <div class="text-lg text-neutral-600">{{ __('Type') }} : {{ $result['type'] }}</div>
                                <div class="text-lg text-neutral-600">{{ __('Hostname') }} : {{ $result['host'] }}</div>
                                <div class="text-lg text-neutral-600">{{ __('Target') }} : {{ $result['target'] }}</div>
                                <div class="text-lg text-neutral-600 mb-3">{{ __('TTL') }} : {{ $result['ttl'] }}</div>
                                @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </section>
</div>
@endsection