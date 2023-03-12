<?php

namespace App\Http\Middleware;

use App\BusinessCard;
use App\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UserPlanMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $plan = User::where('user_id', Auth::user()->user_id)->first();

        $active_plan = json_decode($plan->plan_details);

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
                } else {
                    return $next($request);
                }
            }
        }else{
            return $next($request);
        }
    }
}
