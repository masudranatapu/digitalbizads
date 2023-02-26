<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Setting;
use App\Currency;
use Carbon\Carbon;
use App\BusinessCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Plan;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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
    public function index()
    {
        $plan = User::where('user_id', Auth::user()->user_id)->first();
        $active_plan = json_decode($plan->plan_details);
        $settings = Setting::where('status', 1)->first();
        $business_card = BusinessCard::where('user_id', Auth::user()->id)->count();

        $remaining_days = 0;

        if ($active_plan != null) {
            if (isset($active_plan)) {
                $plan_validity = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', Auth::user()->plan_validity);
                $current_date = Carbon::now();
                $remaining_days = $current_date->diffInDays($plan_validity, false);
                if ($remaining_days <= 0) {
                    $business_card = BusinessCard::where('user_id', Auth::user()->id)->update([
                        'card_status' => 'inactive'
                    ]);

                    return redirect()->route('user.plans');

                    
                }
            }

            $monthCards = [];
            for ($month = 1; $month <= 12; $month++) {
                $startDate = Carbon::create(date('Y'), $month);
                $endDate = $startDate->copy()->endOfMonth();
                $cards = BusinessCard::where('user_id', Auth::user()->id)->where('created_at', '>=', $startDate)->where('created_at', '<=', $endDate)->count();
                $monthCards[$month] = $cards;
            }
            $monthCards = implode(',', $monthCards);

            return view('user.home', compact('settings', 'active_plan', 'remaining_days', 'business_card', 'monthCards'));
        } else {
            return redirect()->route('user.plans');
        }
    }
}
