<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('card_id');
            $table->string('user_id');
            $table->string('theme_id')->nullable();
            $table->string('theme_color')->nullable();
            $table->string('card_lang')->default('EN');
            $table->string('cover');
            $table->string('profile');
            $table->string('card_url')->unique();
            $table->string('card_type');
            $table->string('title');
            $table->longText('sub_title');
            $table->longText('description')->nullable();
            $table->string('card_status')->default('activated');
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
        Schema::dropIfExists('business_cards');
    }
}
