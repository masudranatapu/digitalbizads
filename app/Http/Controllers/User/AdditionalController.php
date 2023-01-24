<?php

namespace App\Http\Controllers\User;

use App\Plan;
use App\User;
use App\Setting;
use Iodev\Whois\Factory as Whois;
use GeoIp2\Database\Reader as GeoIP;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdditionalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // QR Maker
    public function qrMaker(Request $request)
    {
        $active_plan = Plan::where('plan_id', Auth::user()->plan_id)->first(); {
            $plan = User::where('user_id', Auth::user()->user_id)->first();
            if ($active_plan != null) {
                $account_details = User::where('user_id', auth()->user()->user_id)->where('status', 1)->first();
                $settings = Setting::where('status', 1)->first();
                return view('user.additional.qr-maker', compact('account_details', 'settings'));
            } else {
                return redirect()->route('user.plans');
            }
        }
    }

    // Whois Lookup
    public function whoisLookup()
    {
        // Check active plans
        $active_plan = Plan::where('plan_id', Auth::user()->plan_id)->first();

        // Check user plan
        $plan = User::where('id', Auth::user()->id)->first();

        // Check plan
        if ($active_plan != null) {
            // Page rendor
            $settings = Setting::where('status', 1)->first();
            return view('user.additional.whois-lookup', compact('settings'));
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Search Whois Lookup
    public function resultWhoisLookup(Request $request)
    {
        // Queries
        $domain = str_replace(['http://', 'https://', 'www.', 'http://www.', 'https://www.'], '', $request->input('domain'));
        $settings = Setting::where('status', 1)->first();

        $results = false;
        try {
            $results = Whois::get()->createWhois()->loadDomainInfo($domain);
        } catch (\Exception $e) {
	        $results = [];
        }

        return view('user.additional.whois-lookup', compact('domain', 'results', 'settings'));
    }

    // DNS Lookup
    public function dnsLookup()
    {
        // Check active plans
        $active_plan = Plan::where('plan_id', Auth::user()->plan_id)->first();

        // Check user plan
        $plan = User::where('id', Auth::user()->id)->first();

        // Check plan
        if ($active_plan != null) {
            // Page rendor
            $settings = Setting::where('status', 1)->first();
            return view('user.additional.dns-lookup', compact('settings'));
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Search DNS Lookup
    public function resultDnsLookup(Request $request)
    {
        // Queries
        $domain = str_replace(['http://', 'https://'], '', $request->input('domain'));
        $settings = Setting::where('status', 1)->first();

        try {
            $results = dns_get_record($domain, DNS_A + DNS_AAAA + DNS_CNAME + DNS_MX + DNS_TXT + DNS_NS);
        } catch (\Exception $e) {
            $results = [];
        }

        return view('user.additional.dns-lookup', compact('domain', 'results', 'settings'));
    }

    // IP Lookup
    public function ipLookup()
    {
        // Check active plans
        $active_plan = Plan::where('plan_id', Auth::user()->plan_id)->first();

        // Check user plan
        $plan = User::where('id', Auth::user()->id)->first();

        // Check plan
        if ($active_plan != null) {
            // Page rendor
            $settings = Setting::where('status', 1)->first();
            return view('user.additional.ip-lookup', compact('settings'));
        } else {
            // Page redirect in plan is not activated
            return redirect()->route('user.plans');
        }
    }

    // Search IP Lookup
    public function resultIpLookup(Request $request)
    {
        $settings = Setting::where('status', 1)->first();
        $content = $request->input('content');

        // Queries
        try {
            $result = (new GeoIP(storage_path('app/geoip/GeoLite2-City.mmdb')))->city($request->input('ip'))->raw;
        } catch (\Exception $e) {
            $result = false;
        }

        return view('user.additional.ip-lookup', compact('content', 'result', 'settings'));
    }
}
