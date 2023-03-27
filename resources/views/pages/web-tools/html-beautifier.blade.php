@extends('layouts.web', ['nav' => true, 'banner' => false, 'footer' => true, 'cookie' => true, 'setting' => true, 'title' => __('HTML Beautifier - Web Tools')])

{{-- Check Google Adsense is "enabled" --}}
@section('custom-script')
    <script src="{{ asset('js/beautify-html.min.js') }}"></script>
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
                        {{ __('HTML Beautifier') }}
                    </h1>
                </div>

                {{-- HTML Code --}}
                <div class='mb-3 space-y-2 w-full'>
                    <label class='font-bold text-gray-600 py-2'>{{ __('HTML Code') }} <abbr title='required'>*</abbr></label>
                    <textarea
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter font-mono text-base text-black rounded-lg h-48 px-4 py-2"
                        id="html" name="html" cols="30" rows="10" placeholder="{{ __('HTML Code') }}"></textarea>
                </div>

                <button
                    class="lg:inline-block py-2 px-6 bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 text-lg text-white font-bold rounded-l-xl rounded-t-xl transition duration-200 mb-12"
                    onclick="convert()">{{ __('Convert') }}</button>

                {{-- Result --}}
                <div class='mb-3 space-y-2 w-full'>
                    <label class='font-bold text-gray-600 py-2'>{{ __('Output') }} <abbr title='required'>*</abbr></label>
                    <textarea
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter font-mono text-base text-black rounded-lg h-48 px-4 py-2"
                        id="result" name="result" cols="30" rows="10" placeholder="{{ __('Output') }}"></textarea>
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

            function convert() {
                'use strict';
                var options = {
                    "indent_size": 4,
                    "indent_char": " ",
                    "indent_with_tabs": false,
                    "editorconfig": false,
                    "eol": "\n",
                    "end_with_newline": false,
                    "indent_level": 0,
                    "preserve_newlines": true,
                    "max_preserve_newlines": 10,
                    "space_in_paren": false,
                    "space_in_empty_paren": false,
                    "jslint_happy": false,
                    "space_after_anon_function": false,
                    "space_after_named_function": false,
                    "brace_style": "collapse",
                    "unindent_chained_methods": false,
                    "break_chained_methods": false,
                    "keep_array_indentation": false,
                    "unescape_strings": false,
                    "wrap_line_length": 0,
                    "e4x": false,
                    "comma_first": false,
                    "operator_position": "before-newline",
                    "indent_empty_lines": false,
                    "templating": ["auto"]
                }

                var html = document.getElementById('html').value;
                var result = html_beautify(html, options);
                $('#result').val(result);
            }
        </script>
    @endpush
@endsection
