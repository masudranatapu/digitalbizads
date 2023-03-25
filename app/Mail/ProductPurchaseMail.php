<?php

namespace App\Mail;

use App\Order;
use App\ShippingCost;
use App\State;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProductPurchaseMail extends Mailable
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

        return $this->subject('Product purchase invoice.')->view('emails.strore-product-invoice')
            ->with('productOrderTransaction', $this->productOrderTransaction)
            ->with('order', $orders)
            ->with('shipping', $shipping)
            ->with('orderDetails', $this->orderDetails);
    }
}
