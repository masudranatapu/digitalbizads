<footer class="bg-gray-800 pt-10 sm:mt-10 pt-10">
    <div class="max-w-6xl m-auto text-gray-800 flex flex-wrap justify-left">
        <!-- Col-1 -->
        <div class="p-5 w-1/2 sm:w-4/12 {{ $supportPage[1]->section_content || $supportPage[2]->section_content || $supportPage[3]->section_content || $supportPage[4]->section_content != '' ? 'md:w-3/12' : 'md:w-4/12' }}">
            <!-- Col Title -->
            <div class="text-xs uppercase text-gray-400 font-medium mb-6">
                {{ __('Getting Started') }}
            </div>

            <!-- Links -->
            @if (request()->is('/') != false)
            <a href="#how-it-works"
                class="my-3 block text-gray-300 hover:text-gray-100 text-lg font-medium duration-700">
                {{ __('How it works?') }}
            </a>
            @else
            <a href="{{ route('home-locale') }}#how-it-works"
                class="my-3 block text-gray-300 hover:text-gray-100 text-lg font-medium duration-700">
                {{ __('How it works?') }}
            </a>
            @endif

            {{-- @if (request()->is('/') != false)
            <a href="#features" class="my-3 block text-gray-300 hover:text-gray-100 text-lg font-medium duration-700">
                {{ __('Features') }}
            </a>
            @else
            <a href="{{ route('home-locale') }}#features" class="my-3 block text-gray-300 hover:text-gray-100 text-lg font-medium duration-700">
                {{ __('Features') }}
            </a>
            @endif --}}

            @if (request()->is('/') != false)
            <a href="#pricing" class="my-3 block text-gray-300 hover:text-gray-100 text-lg font-medium duration-700">
                {{ __('Pricing') }}
            </a>
            @else
            <a href="{{ route('home-locale') }}#pricing" class="my-3 block text-gray-300 hover:text-gray-100 text-lg font-medium duration-700">
                {{ __('Pricing') }}
            </a>
            @endif

            <a href="{{ route('faq') }}" class="my-3 block text-gray-300 hover:text-gray-100 text-lg font-medium duration-700">
                {{ __('FAQs') }}
            </a>

        </div>

        <!-- Col-2 -->
        <div class="p-5 w-1/2 sm:w-4/12 {{ $supportPage[1]->section_content || $supportPage[2]->section_content || $supportPage[3]->section_content || $supportPage[4]->section_content != '' ? 'md:w-3/12' : 'md:w-4/12' }}">
            <!-- Col Title -->
            <div class="text-xs uppercase text-gray-400 font-medium mb-6">
                {{ __('My Account') }}
            </div>

            <!-- Links -->
            <a href="{{ route('login') }}"
                class="my-3 block text-gray-300 hover:text-gray-100 text-lg font-medium duration-700">
                {{ __('Login') }}
            </a>
            <a href="{{ route('register') }}"
                class="my-3 block text-gray-300 hover:text-gray-100 text-lg font-medium duration-700">
                {{ __('Register') }}
            </a>
        </div>

        <!-- Col-3 -->
        <div class="p-5 w-1/2 sm:w-4/12 {{ $supportPage[1]->section_content || $supportPage[2]->section_content || $supportPage[3]->section_content || $supportPage[4]->section_content != '' ? 'md:w-3/12' : 'md:w-4/12' }}">
            <!-- Col Title -->
            <div class="text-xs uppercase text-gray-400 font-medium mb-6">
                {{ __('Helpful Links') }}
            </div>

            <!-- Links -->
            <a href="{{ route('refund.policy') }}" class="my-3 block text-gray-300 hover:text-gray-100 text-lg font-medium duration-700">
                {{ __('Refund Policy') }}
            </a>
            <a href="mailto:{{ $supportPage[0]->section_content }}" class="my-3 block text-gray-300 hover:text-gray-100 text-lg font-medium duration-700">
                {{ __('Support') }}
            </a>
            <a href="{{ route('privacy.policy') }}" class="my-3 block text-gray-300 hover:text-gray-100 text-lg font-medium duration-700">
                {{ __('Privacy Policy') }}
            </a>
            <a href="{{ route('terms.and.conditions') }}" class="my-3 block text-gray-300 hover:text-gray-100 text-lg font-medium duration-700">
                {{ __('Terms and Conditions') }}
            </a>
        </div>

        @if ($supportPage[1]->section_content || $supportPage[2]->section_content || $supportPage[3]->section_content || $supportPage[4]->section_content != "")
        <!-- Col-3 -->
        <div class="p-5 w-1/2 sm:w-4/12 md:w-3/12">
            <!-- Col Title -->
            <div class="text-xs uppercase text-gray-400 font-medium mb-6">
                {{ __('Social Links') }}
            </div>

            <!-- Links -->
            @if ($supportPage[1]->section_content != "")
            <a href="{{ $supportPage[1]->section_content }}" target="_blank" class="my-3 block text-gray-300 hover:text-gray-100 text-lg font-medium duration-700">
                {{ __('Facebook') }}
            </a>
            @endif
            
            @if ($supportPage[2]->section_content != "")
            <a href="{{ $supportPage[2]->section_content }}" target="_blank" class="my-3 block text-gray-300 hover:text-gray-100 text-lg font-medium duration-700">
                {{ __('Twitter') }}
            </a>
            @endif

            @if ($supportPage[3]->section_content != "")
            <a href="{{ $supportPage[3]->section_content }}" target="_blank" class="my-3 block text-gray-300 hover:text-gray-100 text-lg font-medium duration-700">
                {{ __('Instagram') }}
            </a>
            @endif

            @if ($supportPage[4]->section_content != "")
            <a href="{{ $supportPage[4]->section_content }}" target="_blank" class="my-3 block text-gray-300 hover:text-gray-100 text-lg font-medium duration-700">
                {{ __('LinkedIn') }}
            </a>
            @endif
        </div>
        @endif
    </div>

    <div class="pt-2 pb-2">
        <div class="flex pb-5 px-3 m-auto pt-5
            border-t border-gray-500 text-gray-400 text-lg
            flex-col md:flex-row max-w-6xl">
            <div class="mt-2">
                <span id="year"></span> {{ config('app.name') }}. {{ __('All rights reserved.') }}
            </div>
        </div>
    </div>
</footer>
