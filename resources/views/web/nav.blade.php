<nav class="sticky shadow-sm px-6 py-6 flex justify-between items-center bg-white custom-menu">
    <a class="text-dark text-3xl font-bold leading-none" href="{{ url('/') }}"><img class="h-12"
            src="{{ $settings->site_logo }}" alt="{{ $settings->site_name }}" width="auto"></a>
    <div class="lg:hidden">
        <button class="navbar-burger flex items-center text-dark p-3">

            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
    </div>
    <ul
        class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-4">
        <li>
            <a class="text-lg font-bold hover:text-dark text-dark" href="{{ route('about') }}">{{ __('About') }}</a>
        </li>
        <li class="text-gray-800">
            <svg class="w-4 h-4 current-fill" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                </path>
            </svg>
        </li>
        <li>
            @if (request()->is('/') != false)
            <a class="text-lg font-bold hover:text-dark text-dark" href="#how-it-works">{{ __('How it works?')
                }}</a>
        </li>
        @else
        <a class="text-lg font-bold hover:text-dark text-dark" href="{{ route('home-locale') }}#how-it-works">{{
            __('How it works?') }}</a></li>
        @endif

        <li class="text-gray-800">
            <svg class="w-4 h-4 current-fill" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                </path>
            </svg>
        </li>

        {{-- <li>
            @if (request()->is('/') != false)
            <a class="text-lg font-bold hover:text-dark text-dark" href="#features">{{ __('Features') }}</a>
            @else
            <a class="text-lg font-bold hover:text-dark text-dark" href="{{ route('home-locale') }}#features">{{
                __('Features') }}</a>
            @endif
        </li>

        <li class="text-gray-800">
            <svg class="w-4 h-4 current-fill" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                </path>
            </svg>
        </li>--}}

        <li>
            @if (request()->is('/') != false)
            <a class="text-lg font-bold hover:text-dark text-dark" href="#pricing">{{ __('Pricing') }}</a>
            @else
            <a class="text-lg font-bold hover:text-dark text-dark" href="{{ route('home-locale') }}#pricing">{{
                __('Pricing') }}</a>
            @endif
        </li>
        <li class="text-gray-800">
            <svg class="w-4 h-4 current-fill" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                </path>
            </svg>
        </li>
        <li>
            <a class="text-lg font-bold hover:text-dark text-dark" href="{{ route('contact') }}">{{ __('Contact') }}</a>
        </li>
        {{-- Check webtools --}}
        {{-- @if ($settings->google_adsense_code != 'DISABLE_BOTH')
        <li class="text-gray-800">
            <svg class="w-4 h-4 current-fill" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                </path>
            </svg>
        </li>
        <div @click.away="open = false" class="relative" x-data="{ open: false }">
            <a @click="open = !open" class="text-lg font-bold text-dark" style="cursor: pointer;">
              <span>{{ __('Web Tools') }}</span>
              <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
            <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="overflow-y-auto h-160 journal-scroll absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
              <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.html.beautifier') }}">{{ __('HTML Beautifier') }}</a>
                <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.html.minifier') }}">{{ __('HTML Minifier') }}</a>
                <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.css.beautifier') }}">{{ __('CSS Beautifier') }}</a>
                <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.css.minifier') }}">{{ __('CSS Minifier') }}</a>
                <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.js.beautifier') }}">{{ __('JS Beautifier') }}</a>
                <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.js.minifier') }}">{{ __('JS Minifier') }}</a>
                <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.random.password.generator') }}">{{ __('Random Password Generator') }}</a>
                <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.bcrypt.password.generator') }}">{{ __('Bcrypt Password Generator') }}</a>
                <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.md5.password.generator') }}">{{ __('MD5 Password Generator') }}</a>
                <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.random.word.generator') }}">{{ __('Random Word Generator') }}</a>
                <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.text.counter') }}">{{ __('Text Counter') }}</a>
                <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.lorem.generator') }}">{{ __('Lorem Generator') }}</a>
                <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.emojies') }}">{{ __('Emojies') }}</a>
                <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.dns.lookup') }}">{{ __('DNS Lookup') }}</a>
                <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.ip.lookup') }}">{{ __('IP Address Lookup') }}</a>
                <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.whois.lookup') }}">{{ __('WHOIS Lookup') }}</a>
              </div>
            </div>
        </div>
        @endif --}}
    </ul>

    <div class="hidden lg:inline-block">


        @guest
        <a class="hidden lg:inline-block py-2 px-6 bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 text-lg text-white font-bold rounded-l-xl rounded-t-xl transition duration-200"
            href="{{ route('login') }}">{{ __('Sign In') }}</a>


        @else
        <a class="hidden lg:inline-block py-2 px-6 bg-{{ $config[11]->config_value }}-500 hover:bg-{{ $config[11]->config_value }}-600 text-lg text-white font-bold rounded-l-xl rounded-t-xl transition duration-200"
            href="{{ route('user.dashboard') }}">{{ __('Dashboard') }}</a>
        @endguest
        {{-- @if(count(config('app.languages')) > 1)

        <div @click.away="open = false" class="hidden cursor-pointer lg:inline-block px-2 transition duration-200"
            x-data="{ open: false }">
            <a @click="open = !open"
                class="px-6 py-2 font-semibold text-dark text-center bg-gray-200 rounded-l-xl rounded-t-xl dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 hover:text-dark focus:text-gray-900 hover:bg-gray-300 focus:bg-gray-300 focus:outline-none focus:shadow-outline">
                <span>{{ strtoupper(app()->getLocale()) }}</span>
                <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
                    class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="journal-scroll fixed w-full h-80 overflow-y-scroll mt-2 rounded-lg shadow-lg md:w-40">
                <div class="px-2 py-2 bg-white capitalize rounded-sm shadow dark-mode:bg-gray-800">
                    @foreach(config('app.languages') as $langLocale => $langName)
                    <a class="block px-4 py-2 mt-2 text-lg capitalize font-semi-bold bg-transparent rounded-sm dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langName)
                        }}</a>
                    @endforeach
                </div>
            </div>
        </div>

        @endif --}}
    </div>
</nav>
<section>
    @if (isset($banner) && $banner)
    <div class="bg-white pt-4 lg:pt-2 pb-2 md:pb-2">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full lg:w-1/2 px-4 mb-12 md:mb-20 lg:mb-0 flex items-center">
                    <div class="w-full text-center lg:text-left">
                        <div class="max-w-md mx-auto lg:mx-0">
                            <h2 class="mb-3 text-4xl lg:text-5xl text-white font-bold">
                                <span class="text-{{ $config[11]->config_value }}-500">{{
                                    __($homePage[0]->section_content) }}</span>
                            </h2>
                        </div>
                        <div class="max-w-sm mx-auto lg:mx-0">
                            <p class="mb-6 text-gray-800 leading-loose">
                                {{ __($homePage[1]->section_content) }}
                            </p>
                            <div><a class="inline-block mb-3 lg:mb-0 lg:mr-3 w-full lg:w-auto py-2 px-6 leading-loose bg-{{ $config[11]->config_value }}-600 hover:bg-{{ $config[11]->config_value }}-700 text-white font-semibold rounded-l-xl rounded-t-xl transition duration-200"
                                    href="{{ url('/') }}{{ $homePage[3]->section_content }}">{{
                                    __($homePage[2]->section_content) }}</a><a
                                    class="inline-block w-full lg:w-auto py-2 px-6 leading-loose text-white font-semibold bg-gray-900 border-2 border-gray-700 hover:border-gray-600 rounded-l-xl rounded-t-xl transition duration-200"
                                    href="{{ $homePage[5]->section_content }}">{{ __($homePage[4]->section_content)
                                    }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden lg:block w-full lg:w-1/2 px-4 flex items-center justify-center">
                    <div class="relative web-index"><img
                            class="h-128 w-full max-w-lg object-cover rounded-3xl md:rounded-br-none"
                            src="{{ url('/') }}{{ $config[12]->config_value }}" alt=""><img
                            class="hidden md:block absolute web-nav-top"></div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="hidden navbar-menu relative z-50">
        <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
        <nav
            class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
            <div class="flex items-center mb-8">
                <a class="mr-auto text-3xl font-bold leading-none" href="{{ url('/') }}"><img class="h-10"
                        src="{{ $settings->site_logo }}" alt="{{ $settings->site_name }}" width="auto"></a>
                <button class="navbar-close">
                    <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <div>
                <ul>
                    <li class="mb-1">
                        <a class="block p-4 text-lg font-semibold text-gray-400 hover:bg-{{ $config[11]->config_value }}-50 hover:text-{{ $config[11]->config_value }}-600 rounded"
                            href="{{ route('about') }}">{{ __('About') }}</a>
                    </li>
                    <li class="mb-1">
                        @if (request()->is('/') != false)
                        <a class="block p-4 text-lg font-semibold text-gray-400 hover:bg-{{ $config[11]->config_value }}-50 hover:text-{{ $config[11]->config_value }}-600 rounded"
                            href="#how-it-works">{{ __('How it works?') }}</a>
                        @else
                        <a class="block p-4 text-lg font-semibold text-gray-400 hover:bg-{{ $config[11]->config_value }}-50 hover:text-{{ $config[11]->config_value }}-600 rounded"
                            href="{{ route('home-locale') }}#how-it-works">{{ __('How it works?') }}</a>
                        @endif
                    </li>
                    {{-- <li class="mb-1">
                        @if (request()->is('/') != false)
                        <a class="block p-4 text-lg font-semibold text-gray-400 hover:bg-{{ $config[11]->config_value }}-50 hover:text-{{ $config[11]->config_value }}-600 rounded"
                            href="#features">{{ __('Features') }}</a>
                        @else
                        <a class="block p-4 text-lg font-semibold text-gray-400 hover:bg-{{ $config[11]->config_value }}-50 hover:text-{{ $config[11]->config_value }}-600 rounded"
                            href="{{ route('home-locale') }}#features">{{ __('Features') }}</a>
                        @endif
                    </li> --}}
                    <li class="mb-1">
                        @if (request()->is('/') != false)
                        <a class="block p-4 text-lg font-semibold text-gray-400 hover:bg-{{ $config[11]->config_value }}-50 hover:text-{{ $config[11]->config_value }}-600 rounded"
                            href="#pricing">{{ __('Pricing') }}</a>
                        @else
                        <a class="block p-4 text-lg font-semibold text-gray-400 hover:bg-{{ $config[11]->config_value }}-50 hover:text-{{ $config[11]->config_value }}-600 rounded"
                            href="{{ route('home-locale') }}#pricing">{{ __('Pricing') }}</a>
                        @endif
                    </li>
                    <li class="mb-1">
                        <a class="block p-4 text-lg font-semibold text-gray-400 hover:bg-{{ $config[11]->config_value }}-50 hover:text-{{ $config[11]->config_value }}-600 rounded"
                            href="{{ route('contact') }}">{{ __('Contact') }}</a>
                    </li>

                    {{-- Check webtools --}}
                    {{-- @if ($settings->google_adsense_code != 'DISABLE_BOTH')
                    <div @click.away="open = false" class="relative" x-data="{ open: false }">
                        <a @click="open = !open" class="block p-4 text-lg font-semibold text-gray-400 hover:bg-{{ $config[11]->config_value }}-50 hover:text-{{ $config[11]->config_value }}-600 rounded" style="cursor: pointer;">
                          <span>{{ __('Web Tools') }}</span>
                          <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                          <div class="journal-scroll px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                            <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.html.beautifier') }}">{{ __('HTML Beautifier') }}</a>
                            <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.html.minifier') }}">{{ __('HTML Minifier') }}</a>
                            <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.css.beautifier') }}">{{ __('CSS Beautifier') }}</a>
                            <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.css.minifier') }}">{{ __('CSS Minifier') }}</a>
                            <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.js.beautifier') }}">{{ __('JS Beautifier') }}</a>
                            <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.js.minifier') }}">{{ __('JS Minifier') }}</a>
                            <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.random.password.generator') }}">{{ __('Random Password Generator') }}</a>
                            <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.bcrypt.password.generator') }}">{{ __('Bcrypt Password Generator') }}</a>
                            <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.md5.password.generator') }}">{{ __('MD5 Password Generator') }}</a>
                            <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.random.word.generator') }}">{{ __('Random Word Generator') }}</a>
                            <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.text.counter') }}">{{ __('Text Counter') }}</a>
                            <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.lorem.generator') }}">{{ __('Lorem Generator') }}</a>
                            <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.emojies') }}">{{ __('Emojies') }}</a>
                            <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.dns.lookup') }}">{{ __('DNS Lookup') }}</a>
                            <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.ip.lookup') }}">{{ __('IP Address Lookup') }}</a>
                            <a class="block px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('web.whois.lookup') }}">{{ __('WHOIS Lookup') }}</a>
                          </div>
                        </div>
                    </div>
                    @endif --}}
{{--
                    @if(count(config('app.languages')) > 1)

                    <div @click.away="open = false" @click="open = !open"
                        class="block p-4 text-lg font-semibold text-gray-400 hover:bg-{{ $config[11]->config_value }}-50 hover:text-{{ $config[11]->config_value }}-600 rounded transition duration-200"
                        x-data="{ open: false }">
                        <a
                            class="text-lg font-semibold text-gray-400 hover:bg-{{ $config[11]->config_value }}-50 hover:text-{{ $config[11]->config_value }}-600 rounded dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 hover:text-white focus:text-gray-900 hover:bg-transparent focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <span>{{ strtoupper(app()->getLocale()) }}</span>

                        </a>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="journal-scroll absolute right-0 w-full h-80 overflow-y-scroll mt-2 origin-top-right rounded-lg shadow-lg md:w-40">
                            <div class="px-2 py-2 bg-white capitalize rounded-sm shadow dark-mode:bg-gray-800">
                                @foreach(config('app.languages') as $langLocale => $langName)
                                <a class="block px-4 py-2 mt-2 text-lg capitalize font-semi-bold bg-transparent rounded-sm dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                    href="{{ url()->current() }}?change_language={{ $langLocale }}">{{
                                    strtoupper($langName) }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif --}}

                </ul>
            </div>
            <div class="mt-auto">
                <div class="pt-6">
                    @guest
                    <a class="block px-4 py-3 mb-3 leading-loose text-white text-xs text-center font-semibold leading-none bg-{{ $config[11]->config_value }}-600 hover:bg-{{ $config[11]->config_value }}-700 rounded-l-xl rounded-t-xl"
                        href="{{ route('login') }}">{{ __('Sign In') }}</a>
                    @else
                    <a class="block px-4 py-3 mb-3 leading-loose text-white text-xs text-center font-semibold leading-none bg-{{ $config[11]->config_value }}-600 hover:bg-{{ $config[11]->config_value }}-700 rounded-l-xl rounded-t-xl"
                        href="{{ route('user.dashboard') }}">{{ __('Dashboard') }}</a>
                    @endguest
                </div>
                <p class="my-4 text-xs text-center text-{{ $config[11]->config_value }}-400">
                    <span><span id="year"></span> {{ $settings->site_name }}. {{ __('All rights reserved.') }}</span>
                </p>
                <div class="text-center"><a class="inline-block px-1" href="{{ $supportPage[1]->section_content }}"
                        target="_blank"><img src="{{ asset('frontend/assets/social/facebook.svg') }}" alt=""></a><a
                        class="inline-block px-1" href="{{ $supportPage[2]->section_content }}" target="_blank"><img
                            src="{{ asset('frontend/assets/social/twitter.svg') }}" alt=""></a><a
                        class="inline-block px-1" href="{{ $supportPage[3]->section_content }}" target="_blank"><img
                            src="{{ asset('frontend/assets/social/instagram.svg') }}" alt=""></a></div>
            </div>
        </nav>
    </div>
</section>
