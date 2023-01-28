<?php

namespace App\Http\Controllers;

use App\Plan;
use App\Setting;
use App\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index()
    {
        $homePage = DB::table('pages')->where('page_name', 'home')->get();
        $supportPage = DB::table('pages')->where('page_name', 'footer support email')->orWhere('page_name', 'footer')->get();
        $plans = Plan::where('status', 1)->where('is_private', '0')->get();
        $settings = Setting::where('status', 1)->first();
        $config = DB::table('config')->get();
        
        $currency = Currency::where('iso_code', $config['1']->config_value)->first();

        SEOTools::setTitle($settings->site_name);
        SEOTools::setDescription($settings->seo_meta_description);

        SEOMeta::setTitle($settings->site_name);
        SEOMeta::setDescription($settings->seo_meta_description);
        SEOMeta::addMeta('article:section', $settings->seo_site, 'property');
        SEOMeta::addKeyword([$settings->seo_keywords]);

        OpenGraph::setTitle($settings->site_name);
        OpenGraph::setDescription($settings->seo_meta_description);
        OpenGraph::setUrl(URL::to('/') . '/');
        OpenGraph::addImage([URL::to('/') . $settings->site_logo, 'size' => 300]);

        JsonLd::setTitle($settings->site_name);
        JsonLd::setDescription($settings->seo_meta_description);
        JsonLd::addImage(URL::to('/') . $settings->site_logo);

        return view('web', compact('homePage', 'supportPage', 'plans', 'settings', 'currency', 'config'));
    }

    public function faq()
    {
        $faqPage = DB::table('pages')->where('page_name', 'faq')->get();
        $supportPage = DB::table('pages')->where('page_name', 'footer support email')->orWhere('page_name', 'footer')->get();
        $config = DB::table('config')->get();
        $settings = Setting::where('status', 1)->first();

        return view('pages/faq', compact('faqPage', 'supportPage', 'settings', 'config'));
    }

    public function privacyPolicy()
    {
        $privacyPage = DB::table('pages')->where('page_name', 'privacy')->get();
        $supportPage = DB::table('pages')->where('page_name', 'footer support email')->orWhere('page_name', 'footer')->get();
        $config = DB::table('config')->get();
        $settings = Setting::where('status', 1)->first();

        return view('pages/privacy', compact('privacyPage', 'supportPage', 'settings', 'config'));
    }

    public function refundPolicy()
    {
        $refundPage = DB::table('pages')->where('page_name', 'refund')->get();
        $supportPage = DB::table('pages')->where('page_name', 'footer support email')->orWhere('page_name', 'footer')->get();
        $config = DB::table('config')->get();
        $settings = Setting::where('status', 1)->first();

        return view('pages/refund', compact('refundPage', 'supportPage', 'settings', 'config'));
    }

    public function termsAndConditions()
    {
        $termsPage = DB::table('pages')->where('page_name', 'terms')->get();
        $supportPage = DB::table('pages')->where('page_name', 'footer support email')->orWhere('page_name', 'footer')->get();
        $config = DB::table('config')->get();
        $settings = Setting::where('status', 1)->first();

        return view('pages/terms', compact('termsPage', 'supportPage', 'settings', 'config'));
    }

    public function about()
    {
        $aboutPage = DB::table('pages')->where('page_name', 'about')->get();
        $supportPage = DB::table('pages')->where('page_name', 'footer support email')->orWhere('page_name', 'footer')->get();
        $config = DB::table('config')->get();
        $settings = Setting::where('status', 1)->first();

        return view('pages/about', compact('aboutPage', 'supportPage', 'settings', 'config'));
    }

    public function contact()
    {
        $contactPage = DB::table('pages')->where('page_name', 'contact')->get();
        $supportPage = DB::table('pages')->where('page_name', 'footer support email')->orWhere('page_name', 'footer')->get();
        $config = DB::table('config')->get();
        $settings = Setting::where('status', 1)->first();

        return view('pages/contact', compact('contactPage', 'supportPage', 'settings', 'config'));
    }
}
