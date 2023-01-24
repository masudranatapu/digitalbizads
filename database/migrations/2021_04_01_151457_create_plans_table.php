<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('plan_id')->uniqid();
            $table->string('plan_name');
            $table->longText('plan_description')->nullable();
            $table->string('plan_price');
            $table->string('validity');
            $table->string('no_of_vcards');
            $table->integer('no_of_services');
            $table->integer('no_of_galleries');
            $table->integer('no_of_features');
            $table->integer('no_of_payments');
            $table->string('personalized_link');
            $table->string('hide_branding');
            $table->string('free_setup');
            $table->string('free_support');
            $table->string('recommended')->nullable();
            $table->string('is_private');
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
        Schema::dropIfExists('plans');
    }
}
