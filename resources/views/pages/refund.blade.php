@extends('layouts.web', ['nav' => true, 'banner' => false, 'footer' => true, 'cookie' => true, 'setting' => true,
'title' => __('Refund Policy')])

@section('content')
<div>
    <section class="text-gray-700">
        <div class="container px-5 py-24 mx-auto">
            <div class="mb-16">
                <h1 class="text-5xl font-bold font-large title-font text-gray-900 mb-2 pl-5">
                    {{ __($refundPage[0]->section_content) }}
                </h1>
            </div>

            <div class="flex flex-wrap lg:w-full sm:mx-auto sm:mb-2">
                <div class="w-full lg:w-full">
                    <div class="px-3 lg:px-5 lg:-mt-4 mb-5 lg:mb-0">
                        <p
                            class="mb-3 primary-color-blackish-blue text-xl 2xl:text-4xl font-semibold px-4 lg:px-0 -mt-2 lg:-mt-0">
                            {{ __($refundPage[1]->section_content) }}</p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($refundPage[2]->section_content) }}</p>

                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($refundPage[3]->section_content) }}
                        </p>

                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($refundPage[4]->section_content) }}</p>
                        <br />
                        <p
                            class="primary-color-blackish-blue text-xl 2xl:text-5xl font-semibold px-4 lg:px-0 -mt-2 lg:-mt-0 mb-4">
                            {{ __($refundPage[5]->section_content) }}
                        </p>

                        <p
                            class="primary-color-blackish-blue text-xl 2xl:text-4xl font-semibold px-4 lg:px-0 -mt-2 lg:-mt-0">
                            {{ __($refundPage[6]->section_content) }}</p>
                        <br />
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($refundPage[7]->section_content) }}
                        </p>
                        <p
                            class="mb-5 =primary-color-blackish-blue text-xl 2xl:text-4xl font-semibold px-4 lg:px-0 -mt-2 lg:-mt-0">
                            {{ __($refundPage[8]->section_content) }}
                        </p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($refundPage[9]->section_content) }}
                        </p>

                        <p
                            class="mb-2 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($refundPage[10]->section_content) }}</p>
                        <p
                            class="mb-2 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($refundPage[11]->section_content) }}
                        </p>
                        <p
                            class="mb-2 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($refundPage[12]->section_content) }}</p>
                        <p
                            class="mb-2 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($refundPage[13]->section_content) }}</p>
                        <p
                            class="mb-2 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($refundPage[14]->section_content) }}
                        </p>
                        <p
                            class="mb-2 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($refundPage[15]->section_content) }}</p>
                        <br>

                        <p
                            class="mb-5 primary-color-blackish-blue text-xl 2xl:text-4xl font-semibold px-4 lg:px-0 -mt-2 lg:-mt-0">
                            {{ __($refundPage[16]->section_content) }}</p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($refundPage[17]->section_content) }}
                        </p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($refundPage[18]->section_content) }}
                        </p>
                        <p
                            class="primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($refundPage[19]->section_content) }}</p>
                        <br />

                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($refundPage[20]->section_content) }}
                        </p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($refundPage[21]->section_content) }}
                        </p>
                        <br>

                        <p
                            class="mb-5 primary-color-blackish-blue text-xl 2xl:text-4xl font-semibold px-4 lg:px-0 -mt-2 lg:-mt-0">
                            {{ __($refundPage[22]->section_content) }}
                        </p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($refundPage[23]->section_content) }}</p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($refundPage[24]->section_content) }}
                        </p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($refundPage[25]->section_content) }}
                        </p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($refundPage[26]->section_content) }}</p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($refundPage[27]->section_content) }}
                        </p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($refundPage[28]->section_content) }}
                        </p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($refundPage[29]->section_content) }}
                        </p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($refundPage[30]->section_content) }}
                        </p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($refundPage[31]->section_content) }}
                        </p>

                        <p
                            class="primary-color-blackish-blue text-xl 2xl:text-4xl font-semibold px-4 lg:px-0 -mt-2 lg:-mt-0">
                            {{ __($refundPage[32]->section_content) }}</p>
                        <br />
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($refundPage[33]->section_content) }}
                        </p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($refundPage[34]->section_content) }}
                        </p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($refundPage[35]->section_content) }}
                        </p>

                        <p
                            class="primary-color-blackish-blue text-xl 2xl:text-4xl font-semibold px-4 lg:px-0 -mt-2 lg:-mt-0">
                            {{ __($refundPage[36]->section_content) }}</p>
                        <br />
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($refundPage[37]->section_content) }}
                        </p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($refundPage[38]->section_content) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <section>
</div>
@endsection
