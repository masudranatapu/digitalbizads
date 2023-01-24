<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gobiz_transaction_id')->uniqid();
            $table->string('transaction_date');
            $table->string('transaction_id');
            $table->string('user_id');
            $table->string('plan_id');
            $table->longText('desciption');
            $table->string('payment_gateway_name');
            $table->string('transaction_currency');
            $table->string('transaction_amount');
            $table->string('invoice_number')->nullable();
            $table->string('invoice_prefix')->nullable();
            $table->longText('invoice_details');
            $table->string('payment_status');
            $table->string('status')->default(1);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
