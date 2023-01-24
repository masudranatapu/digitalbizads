<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('card_id')->uniqid();
            $table->string('product_id')->uniqid();
            $table->longText('badge');
            $table->longText('product_image');
            $table->longText('product_name');
            $table->longText('product_subtitle')->nullable();
            $table->string('regular_price');
            $table->string('sales_price');
            $table->string('product_status');
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
        Schema::dropIfExists('store_products');
    }
}
