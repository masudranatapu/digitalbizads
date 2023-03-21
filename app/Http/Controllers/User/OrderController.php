<?php

namespace App\Http\Controllers\User;

use App\BusinessCard;
use App\Http\Controllers\Controller;
use App\Order;
use App\Setting;
use App\StoreProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index($card_id)
    {
        $settings = Setting::first();
        $businessCard = BusinessCard::where('card_id', $card_id)->where('status', 1)->first();
        $orders = Order::where('store_id', $businessCard->card_id)->get();

        return view('user.order.index', compact('settings', 'orders', 'card_id'));
    }


    public function view($card_id, $id)
    {

        $settings = Setting::first();

        $orders = Order::with('orderDetails')->where('store_id', $card_id)->where('id', $id)->first();


        return view('user.order.view', compact('settings', 'orders'));
    }
}
