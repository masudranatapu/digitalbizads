@extends('layouts.web', ['nav' => true, 'banner' => false, 'footer' => true, 'cookie' => true, 'setting' => true,
'title' => __('Password Generator (MD5) - Web Tools')])

{{-- Check Google Adsense is "enabled" --}}
@section('custom-script')
<script src="{{ asset('backend/js/clipboard.min.js') }}"></script>
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
                    {{ __('Password Generator (MD5)') }}
                </h1>
            </div>

            {{-- Form --}}
            <form action="{{ route('web.result.md5.password.generator')}}" method="post">
                @csrf
                {{-- Password --}}
                <div class='mb-3 space-y-2 w-full'>
                    <label class='font-bold text-gray-600 py-2'>{{ __('Password') }} <abbr title='required'>*</abbr></label>
                    <input type="text" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter font-mono text-base text-black rounded-lg h-10 px-4" name="password" id="password" placeholder="{{ __('Password')}}" value="@isset($password){{ $password }}@endisset">
                </div>

                <button type="submit" class="lg:inline-block py-2 px-6 bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 text-lg text-white font-bold rounded-l-xl rounded-t-xl transition duration-200 mb-12" onclick="convert()">{{ __('Generate') }}</button>
            </form>

            {{-- Result --}}
            @if (isset($results))
                <div class='mb-3 space-y-2 w-full'>
                    <label class='font-bold text-gray-600 py-2'>{{ __('Result') }} <abbr title='required'>*</abbr></label>
                    <input type="text" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter font-mono text-base text-black rounded-lg h-10 px-4" name="result" id="result" placeholder="{{ __('Result')}}" value="{{ $results }}">
                </div>

                <button class="copyBtn lg:inline-block py-2 px-6 bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 text-lg text-white font-bold rounded-l-xl rounded-t-xl transition duration-200 mb-12" data-clipboard-action="copy" data-clipboard-target="#result">{{ __('Copy to clipboard') }}</button>
            @endif
        </div>
    </section>
</div>

{{-- Custom JS --}}
@push('custom-js')
<script>
new ClipboardJS('.copyBtn');
</script>
@endpush
@endsection