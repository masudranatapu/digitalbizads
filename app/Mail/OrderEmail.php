<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $settings;
    public $owner;
    public $customer_info;
    public $cart;
    public function __construct($settings, $owner, $customer_info, $cart)
    {
        $this->settings = $settings;
        $this->owner = $owner;
        $this->customer_info = $customer_info;
        $this->cart = $cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('You have a new order')->view('emails.ordermail')
            ->with('settings', $this->settings)
            ->with('owner', $this->owner)
            ->with('cart', $this->cart)
            ->with('customer_info', $this->customer_info);
    }
}
