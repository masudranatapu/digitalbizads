<div class="fixed bottom-0 inset-x-0 z-50 js-cookie-consent cookie-consent">
    <div class="max-w-md mx-4 md:mx-0 md:ml-10 mb-6 pt-8 bg-gray-700 text-white rounded-lg">
        <div class="px-8 text-center">
            <p class="font-bold font-heading">{{ __('Cookie Policy') }}</p>
            <p class="mb-5 mt-3 mb-6 text-gray-400 text-sm">{{ trans('Your experience on this site will be improved by allowing cookies.') }}</p>
        </div>
        <div class="flex border-t border-gray-600 text-center"><a onclick="closeCookie()"
                class="inline-block w-1/2 py-4 text-sm rounded-bl-lg border-r border-gray-600 font-bold hover:bg-gray-600 transition duration-200"
                href="#">{{ __('Decline Cookies') }}</a><a
                class="inline-block w-1/2 py-4 text-sm rounded-br-lg text-white font-bold hover:bg-gray-600 transition duration-200 js-cookie-consent-agree cookie-consent__agree"
                href="#">{{ trans('Allow cookies') }}</a></div>
    </div>
</div>