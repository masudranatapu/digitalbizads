<?php

namespace App\Http\Controllers\Admin;

use App\Plan;
use App\User;
use App\Theme;
use App\Gateway;
use App\Setting;
use App\Currency;
use App\Transaction;
use App\BusinessCard;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
        // Queries
        $settings = Setting::where('status', 1)->first();
        $config = DB::table('config')->get();
        $currency = Currency::where('iso_code', $config['1']->config_value)->first();
        $overall_income = Transaction::where('payment_status', 'Success')->sum('transaction_amount');
        $today_income = Transaction::where('payment_status', 'Success')->whereDate('created_at', Carbon::today())->sum('transaction_amount');
        $overall_users = User::where('role_id', 2)->where('status', 1)->count();
        $today_users = User::where('role_id', 2)->where('status', 1)->whereDate('created_at', Carbon::today())->count();

        // Chart
        $monthIncome = [];
        $monthUsers = [];
        for ($month = 1; $month <= 12; $month++)
        {
            $startDate = Carbon::create(date('Y'), $month);
            $endDate = $startDate->copy()->endOfMonth();
            $sales = Transaction::where('payment_status', 'Success')->where('created_at', '>=', $startDate)->where('created_at', '<=', $endDate)->sum('transaction_amount');
            $users = User::where('role_id', 2)->where('created_at', '>=', $startDate)->where('created_at', '<=', $endDate)->count();
            $monthIncome[$month] = $sales;
            $monthUsers[$month] = $users;
        }
        $monthIncome = implode(',', $monthIncome);
        $monthUsers = implode(',', $monthUsers);

        // View
        return view('admin.home', compact('overall_income', 'today_income', 'overall_users', 'today_users', 'currency', 'settings', 'monthIncome', 'monthUsers'));
    }
}
