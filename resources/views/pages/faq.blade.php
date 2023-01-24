@extends('layouts.web', ['nav' => true, 'banner' => false, 'footer' => true, 'cookie' => true, 'setting' => true, 'title' => __('FAQs')])

@section('content')
<div>
    <section class="text-gray-700">
        <div class="container px-5 py-24 mx-auto">
            <div class="text-center mb-20">
                <h1 class="text-4xl font-bold font-medium text-center title-font text-gray-900 mb-4">
                    {{ __($faqPage[0]->section_content) }}
                </h1>
                <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto">
                    {{ __($faqPage[1]->section_content) }}
                </p>
            </div>
            <div class="flex flex-wrap lg:w-4/5 sm:mx-auto sm:mb-2 -mx-2">
                <div class="w-full lg:w-1/2 px-4 py-2">
                    <details class="mb-4">
                        <summary class="font-semibold  bg-gray-200 rounded-md py-2 px-4">
                            {{ __($faqPage[2]->section_content) }}
                        </summary>

                        <span>
                            {{ __($faqPage[3]->section_content) }}
                        </span>
                    </details>
                    <details class="mb-4">
                        <summary class="font-semibold bg-gray-200 rounded-md py-2 px-4">
                            {{ __($faqPage[4]->section_content) }}
                        </summary>

                        <span>
                            {{ __($faqPage[5]->section_content) }}
                        </span>
                    </details>
                    <details class="mb-4">
                        <summary class="font-semibold  bg-gray-200 rounded-md py-2 px-4">
                            {{ __($faqPage[6]->section_content) }}
                        </summary>

                        <span>
                            {{ __($faqPage[7]->section_content) }}
                        </span>
                    </details>
                </div>
                <div class="w-full lg:w-1/2 px-4 py-2">
                    <details class="mb-4">
                        <summary class="font-semibold  bg-gray-200 rounded-md py-2 px-4">
                            {{ __($faqPage[8]->section_content) }}
                        </summary>

                        <span class="px-4 py-2">
                            {{ __($faqPage[9]->section_content) }}
                        </span>
                    </details>
                    <details class="mb-4">
                        <summary class="font-semibold  bg-gray-200 rounded-md py-2 px-4">
                            {{ __($faqPage[10]->section_content) }}
                        </summary>

                        <span class="px-4 py-2">
                            {{ __($faqPage[11]->section_content) }}
                        </span>
                    </details>
                    <details class="mb-4">
                        <summary class="font-semibold  bg-gray-200 rounded-md py-2 px-4">
                            {{ __($faqPage[12]->section_content) }}
                        </summary>

                        <span class="px-4 py-2">
                            {{ __($faqPage[13]->section_content) }}
                        </span>
                    </details>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
