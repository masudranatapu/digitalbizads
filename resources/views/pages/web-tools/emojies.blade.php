@extends('layouts.web', ['nav' => true, 'banner' => false, 'footer' => true, 'cookie' => true, 'setting' => true,
'title' => __('Emojies - Web Tools')])

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
                    {{ __('Emojies') }}
                </h1>
            </div>

            {{-- Emojies --}}
            <div class='mb-3 space-y-2 w-full'>
                <label class='font-bold text-gray-600 py-2'>{{ __('Content') }} <abbr title='required'>*</abbr></label>
                <textarea name="content" id="content" cols="30" rows="10" class="content appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter font-mono text-base text-black rounded-lg h-48 px-4 py-2" placeholder="{{ __('Content')}}"></textarea>
            </div>

            <button class="emojiPicker lg:inline-block py-2 px-6 bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 text-lg text-white font-bold rounded-l-xl rounded-t-xl transition duration-200 mb-12">{{ __('Start Picker') }}</button>

            <button class="copyBtn lg:inline-block py-2 px-6 bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 text-lg text-white font-bold rounded-l-xl rounded-t-xl transition duration-200 mb-12" data-clipboard-action="copy" data-clipboard-target="#content">{{ __('Copy to clipboard') }}</button>
        </div>
    </section>
</div>

{{-- Custom JS --}}
@push('custom-js')
<script src="{{ asset('js/EmojiPicker.js') }}"></script>
<script>
new ClipboardJS('.copyBtn');
new EmojiPicker({
    trigger: [
        {
            selector: '.emojiPicker',
            insertInto: '.content'
        }
    ],
    closeButton: true,
    //specialButtons: green
});


</script>
@endpush
@endsection