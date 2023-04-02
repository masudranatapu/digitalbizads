<?php

namespace App\Mail;

use App\BusinessCard;
use App\Order;
use App\ShippingCost;
use App\State;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProductPurchaseMailSeller extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $productOrderTransaction, $order, $orderDetails;
    public function __construct($productOrderTransaction, $order, $orderDetails)
    {
        $this->productOrderTransaction = $productOrderTransaction;
        $this->order = $order;
        $this->orderDetails = $orderDetails;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $orders = $this->order;
        $shipping = json_decode($orders->shipping_details, true);
        $shippingArea = ShippingCost::find($shipping['ship_area']);
        $shippingState = State::find($shipping['ship_state']);
        $shipping['shipping_area'] = $shippingArea->name;
        $shipping['shipping_states'] = $shippingState->name;
        $orders = Order::with('orderDetails')->find($this->order->id);
        $business_card_details = BusinessCard::with('hasUser')->where('card_id', $orders->store_id)->first();

        return $this->subject('Order Notification')->view('emails.product-purchase-notify-admin')
            ->with('businessCard', $business_card_details)
            ->with('productOrderTransaction', $this->productOrderTransaction)
            ->with('order', $orders)
            ->with('shipping', $shipping)
            ->with('orderDetails', $this->orderDetails);
    }
}
