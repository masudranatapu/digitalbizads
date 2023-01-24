@extends('layouts.web', ['nav' => true, 'banner' => false, 'footer' => true, 'cookie' => true, 'setting' => true,
'title' => __('Terms and Conditions')])

@section('content')
<div>
    <section class="text-gray-700">
        <div class="container px-5 py-24 mx-auto">
            <div class="mb-16">
                <h1 class="text-5xl font-bold font-large title-font text-gray-900 mb-2 pl-5">
                    {{ __($termsPage[0]->section_content) }}
                </h1>
            </div>

            <div class="flex flex-wrap lg:w-full sm:mx-auto sm:mb-2">
                <div class="w-full lg:w-full">
                    <div class="px-3 lg:px-5 lg:-mt-4 mb-5 lg:mb-0">
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[1]->section_content) }}</p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[2]->section_content) }}</p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[3]->section_content) }}
                        </p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[4]->section_content) }}</p>

                        <p
                            class="primary-color-blackish-blue text-xl 2xl:text-4xl font-semibold px-4 lg:px-0 -mt-2 lg:-mt-0">
                            {{ __($termsPage[5]->section_content) }}
                        </p>
                        <br />
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[6]->section_content) }}</p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[7]->section_content) }}
                        </p>

                        <p
                            class="primary-color-blackish-blue text-xl 2xl:text-4xl font-semibold px-4 lg:px-0 -mt-2 lg:-mt-0">
                            {{ __($termsPage[8]->section_content) }}
                        </p>
                        <br />
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[9]->section_content) }}
                        </p>

                        <p
                            class="primary-color-blackish-blue text-xl 2xl:text-4xl font-semibold px-4 lg:px-0 -mt-2 lg:-mt-0">
                            {{ __($termsPage[10]->section_content) }}</p>
                        <br />
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[11]->section_content) }}
                        </p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[12]->section_content) }}</p>

                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[13]->section_content) }}</p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[14]->section_content) }}
                        </p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[15]->section_content) }}</p>

                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[16]->section_content) }}</p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[17]->section_content) }}
                        </p>
                        <p
                            class="primary-color-blackish-blue text-xl 2xl:text-4xl font-semibold px-4 lg:px-0 -mt-2 lg:-mt-0">
                            {{ __($termsPage[18]->section_content) }}
                        </p>
                        <br>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[19]->section_content) }}</p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[20]->section_content) }}
                        </p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[21]->section_content) }}
                        </p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[22]->section_content) }}
                        </p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[23]->section_content) }}</p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[24]->section_content) }}
                        </p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[25]->section_content) }}
                        </p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[26]->section_content) }}</p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[27]->section_content) }}
                        </p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[28]->section_content) }}
                        </p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[29]->section_content) }}
                        </p>

                        <p
                            class="primary-color-blackish-blue text-xl 2xl:text-4xl font-semibold px-4 lg:px-0 -mt-2 lg:-mt-0">
                            {{ __($termsPage[30]->section_content) }}
                        </p>
                        <br>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[31]->section_content) }}
                        </p>
                        <p
                            class="primary-color-blackish-blue text-xl 2xl:text-4xl font-semibold px-4 lg:px-0 -mt-2 lg:-mt-0">
                            {{ __($termsPage[32]->section_content) }}</p>
                        <br>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[33]->section_content) }}
                        </p>

                        <p
                            class="primary-color-blackish-blue text-xl 2xl:text-4xl font-semibold px-4 lg:px-0 -mt-2 lg:-mt-0">
                            {{ __($termsPage[34]->section_content) }}
                        </p>
                        <br>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[35]->section_content) }}
                        </p>

                        <p
                            class="primary-color-blackish-blue text-xl 2xl:text-4xl font-semibold px-4 lg:px-0 -mt-2 lg:-mt-0">
                            {{ __($termsPage[36]->section_content) }}
                        </p>
                        <br>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[37]->section_content) }}
                        </p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[38]->section_content) }}
                        </p>

                        <p
                            class="primary-color-blackish-blue text-xl 2xl:text-4xl font-semibold px-4 lg:px-0 -mt-2 lg:-mt-0">
                            {{ __($termsPage[39]->section_content) }}
                        </p>
                        <br>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[40]->section_content) }}
                        </p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[41]->section_content) }}</p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[42]->section_content) }}
                        </p>
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-lg 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ __($termsPage[43]->section_content) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <section>
</div>
@endsection
