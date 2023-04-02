<?php

namespace App\Http\Controllers\User;

use App\BusinessCard;
use App\Http\Controllers\Controller;
use App\Order;
use App\Setting;
use App\ShippingCost;
use App\State;
use App\StoreProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index($card_id)
    {
        $settings = Setting::first();
        $businessCard = BusinessCard::where('card_id', $card_id)->where('status', 1)->first();
        if (isset($businessCard)) {
            $orders = Order::with('hasTransection')->where('store_id', $businessCard->card_id)->orderBy('created_at', 'desc')->get();
            return view('user.order.index', compact('settings', 'orders', 'card_id'));
        } else {

            alert()->error(trans('No Store activated'));
            return redirect()->route('user.stores');
        }
    }


    public function view($card_id, $id)
    {

        $settings = Setting::first();

        $orders = Order::with('orderDetails')->where('store_id', $card_id)->where('id', $id)->first();
        $businessCard = BusinessCard::where('card_id', $card_id)->where('status', 1)->first();

        $shipping = json_decode($orders->shipping_details, true);
        $shippingArea = ShippingCost::find($shipping['ship_area']);
        $shippingState = State::find($shipping['ship_state']);
        $shipping['shipping_area'] = $shippingArea->name;
        $shipping['shipping_states'] = $shippingState->name;



        return view('user.order.view', compact('settings', 'orders', 'shipping', 'businessCard'));
    }
}
