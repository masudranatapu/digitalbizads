@extends('layouts.web', ['nav' => true, 'banner' => false, 'footer' => true, 'cookie' => true, 'setting' => true,
'title' => __('IP Address Lookup - Web Tools')])

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
                    {{ __('IP Address Lookup') }}
                </h1>
            </div>

            {{-- Form --}}
            <form action="{{ route('web.result.ip.lookup')}}" method="post">
                @csrf

                {{-- IP Address fields --}}
                <div class='mb-3 space-y-2 w-full'>
                    <label class='font-bold text-gray-600 py-2'>{{ __('IP Address') }} <abbr title='required'>*</abbr></label>
                    <input placeholder='{{ $result['traits']['ip_address'] ?? (old('ip') ?? request()->ip()) }}' class='appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4' required='required' type='text' name='ip' id='ip'>
                </div>

                <button type="submit" class="lg:inline-block py-2 px-6 bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 text-lg text-white font-bold rounded-l-xl rounded-t-xl transition duration-200">{{ __('Search') }}</button>
            </form>

            {{-- IP Address Result --}}
            @if(!empty($results))
            <div class='flex flex-wrap lg:w-full sm:mx-auto sm:mb-2 lg:mt-12'>  
                <div class="rounded-xl border p-5 shadow-md w-full bg-white">
                    <div class="flex w-full items-center justify-between border-b pb-3">
                        <div class="flex items-center space-x-3">
                            <div class="text-lg font-bold text-slate-700">{{ __('Result') }}</div>
                        </div>
                        <div class="flex items-center space-x-8">
                            <button class="rounded-2xl border bg-neutral-100 px-3 py-1 font-semibold">{{ __('IP') }}</button>
                        </div>
                    </div>
                
                    {{-- Country Name --}}
                    <div class="mt-4 mb-2">
                        <div class="mb-3 text-xl font-bold">{{ __('Country Name') }}</div>
                        <div class="text-lg text-neutral-600"><img width="20" height="20" src="{{ asset('/images/icons/countries/'. mb_strtolower($results['country']['iso_code'] ?? 'not-found')) }}.svg" alt="{{ __($results['country']['names']['en'] ?? 'Not found') }}">{{ __($results['country']['names']['en'] ?? 'Not found') }}</div>
                    </div>

                    {{-- City Name --}}
                    <div class="mt-4 mb-2">
                        <div class="mb-3 text-xl font-bold">{{ __('City Name') }}</div>
                        <div class="text-lg text-neutral-600">{{ __($results['city']['names']['en'] ?? 'Not found') }}</div>
                    </div>

                    {{-- Postal code --}}
                    <div class="mt-4 mb-2">
                        <div class="mb-3 text-xl font-bold">{{ __('Postal code') }}</div>
                        <div class="text-lg text-neutral-600">{{ __($results['postal']['code'] ?? 'Not found') }}</div>
                    </div>

                    {{-- Latitude --}}
                    <div class="mt-4 mb-2">
                        <div class="mb-3 text-xl font-bold">{{ __('Latitude') }}</div>
                        <div class="text-lg text-neutral-600">{{ __($results['location']['latitude'] ?? 'Not found') }}</div>
                    </div>

                    {{-- Longtitude --}}
                    <div class="mt-4 mb-2">
                        <div class="mb-3 text-xl font-bold">{{ __('Longtitude') }}</div>
                        <div class="text-lg text-neutral-600">{{ __($results['location']['longitude'] ?? 'Not found') }}</div>
                    </div>

                    {{-- Timezone --}}
                    <div class="mt-4 mb-2">
                        <div class="mb-3 text-xl font-bold">{{ __('Timezone') }}</div>
                        <div class="text-lg text-neutral-600">{{ __($results['location']['time_zone'] ?? 'Not found') }}</div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
</div>
@endsection