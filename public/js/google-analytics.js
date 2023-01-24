(function($) {
"use strict";
window.dataLayer = window.dataLayer || [];
function gtag() { dataLayer.push(arguments); }
gtag('js', new Date());

gtag('config', '{{ $settings->google_analytics_id }}');
})(jQuery);