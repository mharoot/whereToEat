<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_menu', function (Blueprint $table) {
            $table->integer('restaurant_id');
            $table->string('item_description', 1000)->nullable();
            $table->string('item_title', 300)->nullable();
            $table->double('item_price', 5, 2)->nullable(); // DOUBLE equivalent with precision, 5 digits in total and 2 after the decimal point // $99,999 most expensive meal
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurant_menu');
    }
}
