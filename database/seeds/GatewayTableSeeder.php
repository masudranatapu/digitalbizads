<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class GatewayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gateways')->insert([
            "payment_gateway_id" => "60964401751ab",
            "payment_gateway_logo"  => "/backend/img/payment-method/paypal.png",
            "payment_gateway_name"  => "Paypal",
            "display_name"  => "Paypal",
            "client_id"  => "5",
            "secret_key"  => "6",
            "is_status"  => "enabled"
        ]);

        DB::table('gateways')->insert([
            "payment_gateway_id" => "60964410731d9",
            "payment_gateway_logo"  => "/backend/img/payment-method/razorpay.png",
            "payment_gateway_name"  => "Razorpay",
            "display_name"  => "Razorpay",
            "client_id"  => "7",
            "secret_key"  => "8",
            "is_status"  => "enabled"
        ]);

        DB::table('gateways')->insert([
            "payment_gateway_id" => "60964410732t9",
            "payment_gateway_logo"  => "/backend/img/payment-method/stripe.png",
            "payment_gateway_name"  => "Stripe",
            "display_name"  => "Stripe",
            "client_id"  => "10",
            "secret_key"  => "11",
            "is_status"  => "enabled"
        ]);

        DB::table('gateways')->insert([
            "payment_gateway_id" => "659644107y2g5",
            "payment_gateway_logo"  => "/backend/img/payment-method/bank-transfer.png",
            "payment_gateway_name"  => "Bank Transfer",
            "display_name"  => "Bank Transfer",
            "client_id"  => "12",
            "secret_key"  => "13",
            "is_status"  => "enabled"
        ]);
    }
}
