<?php

namespace App\Http\Controllers;

use App\Plan;
use App\User;
use App\Gallery;
use App\Setting;
use App\Currency;
use App\BusinessCard;
use App\BusinessField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Support\Facades\Redirect;
use Validator;
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

    public function getPreview($cardurl)
    {

            $cardinfo = BusinessCard::select('business_cards.*','plans.plan_name','plans.hide_branding')
            ->where('business_cards.card_url', $cardurl)
            ->leftJoin('users','users.id','business_cards.user_id')
            ->leftJoin('plans','plans.id','users.plan_id')
            ->first();
            if($cardinfo == null){
                return redirect()->route('user.card.create');
            }

        if($cardinfo){
            $cardinfo->gallery = Gallery::where('card_id',$cardinfo->id)->get();
            $cardinfo->contacts = BusinessField::where('card_id',$cardinfo->id)->get();
            // DB::table('business_cards')->where('id',$cardinfo->id)->increment('total_hit', 1);
            $user = User::find($cardinfo->user_id);
            $url = url($cardinfo->card_url);

            if(Auth::user() && ($cardinfo->user_id == Auth::id()) ){
            }else{
                // if($cardinfo->status == 0){
                //     Toastr::warning('This card is not active now');
                //     return redirect()->route('home');
                // }
                if($cardinfo->status == 2){
                    Toastr::warning('This card is not available');
                    return redirect()->route('home');
                }
            }
            return view('card-preview', compact('cardinfo','user'));
        }else{

            Toastr::warning('This card is not available please create your desired card');
            return redirect()->route('user.card.create');
        }
    }





    public function postSubscriber(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
            ]);
            if ($validator->fails()) {
                return back();
            }
                DB::beginTransaction();
                try {

                    $email = $request->email;
                    Mail::send('emails.subscriber',compact('email'), function($message)use($email) {
                        $message->to($email, $email)
                        // ->cc('asas@gmail.com')
                        ->subject('Subscriber mail');
                        });
                    Mail::send('emails.subcription',compact('email'), function($message)use($email) {
                        $message->to($email, $email)
                        ->subject('Subscriber mail');
                        });


                } catch (\Exception $e) {
                    DB::rollback();
                    Toastr::warning(trans('Unable to subscribe'), 'Warning', ["positionClass" => "toast-top-center"]);
                    return redirect()->back();
                }
                DB::commit();
                Toastr::success(trans('Successfully subscribe'), 'Warning', ["positionClass" => "toast-top-center"]);
                 return redirect()->back();
            }

}
