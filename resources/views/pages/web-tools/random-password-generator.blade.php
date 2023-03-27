@extends('layouts.web', ['nav' => true, 'banner' => false, 'footer' => true, 'cookie' => true, 'setting' => true, 'title' => __('Random Password Generator - Web Tools')])

{{-- Check Google Adsense is "enabled" --}}
@section('custom-script')
    <script src="{{ asset('backend/js/clipboard.min.js') }}"></script>
    @if ($settings->google_adsense_code != 'DISABLE_ADSENSE_ONLY')
        {{-- AdSense code --}}
        <script async
            src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client={{ $settings->google_adsense_code }}"
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
                        {{ __('Random Password Generator') }}
                    </h1>
                </div>

                {{-- No. Of Characters --}}
                <div class='mb-3 space-y-2 w-full'>
                    <label class='font-bold text-gray-600 py-2'>{{ __('No. Of Characters') }} <abbr
                            title='required'>*</abbr></label>
                    <input
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter font-mono text-base text-black rounded-lg h-10 px-4"
                        id="password" name="password" type="number" min="1" max="9"
                        placeholder="{{ __('No. Of Characters') }}">
                </div>

                <button
                    class="lg:inline-block py-2 px-6 bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 text-lg text-white font-bold rounded-l-xl rounded-t-xl transition duration-200 mb-12"
                    onclick="generatePassword()">{{ __('Convert') }}</button>

                {{-- Result --}}
                <div class='mb-3 space-y-2 w-full'>
                    <label class='font-bold text-gray-600 py-2'>{{ __('Output') }} <abbr title='required'>*</abbr></label>
                    <input
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter font-mono text-base text-black rounded-lg h-10 px-4"
                        id="result" name="result" type="text" placeholder="{{ __('Output') }}">
                </div>

                <button
                    class="copyBtn lg:inline-block py-2 px-6 bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 text-lg text-white font-bold rounded-l-xl rounded-t-xl transition duration-200 mb-12"
                    data-clipboard-action="copy" data-clipboard-target="#result">{{ __('Copy to clipboard') }}</button>
            </div>
        </section>
    </div>

    {{-- Custom JS --}}
    @push('script')
        <script>
            new ClipboardJS('.copyBtn');

            function generatePassword() {

                var length = $('#password').val(),
                    charset = "!#$@+&abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
                    retVal = "";
                // Check length
                if (length < 9999) {
                    for (var i = 0, n = charset.length; i < length; ++i) {
                        retVal += charset.charAt(Math.floor(Math.random() * n));
                    }
                    $('#result').val(retVal);
                } else {
                    $('#result').val(`{{ __('Maximum limit reached') }}`);
                }
            }
        </script>
    @endpush
@endsection
