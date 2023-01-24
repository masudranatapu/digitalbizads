@extends('layouts.web', ['nav' => false, 'banner' => false, 'footer' => false, 'cookie' => false, 'setting' => false, 'title' => true, 'title' => __('500 - Internal Server Error')])

@section('content')
<section>
    <div class="flex flex-wrap">
        <div class="pt-6 lg:pt-16 pb-6 w-full lg:w-full mt-48">
            <div class="max-w-md mx-auto">
                <div>
                    <div class="mb-6 px-3 text-center">
                        <span class="text-gray-500">{{ __('500') }}</span>
                        <h3 class="text-2xl font-bold mb-5">{{ __('Internal Server Error') }}</h3>
                        <a class="mb-6 w-full p-4 bg-blue-600 hover:bg-blue-700 rounded text-sm font-bold text-gray-50 transition duration-200"
                            href="{{ url('/') }}">{{ __('Back to home') }}</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
