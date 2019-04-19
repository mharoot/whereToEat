<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create restaurants table
        Schema::create('restaurants', function (Blueprint $table) {
            $table->increments('id');    // auto-incrementing integer ID and primary key
            $table->string('restaurant_name', 300); // Restaurant name
            $table->string('street_address');  // Street Adddress
            $table->string('city'); // City
            $table->string('state'); // State
            $table->string('website')->nullable(); // Website (optional)
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable(); // value can be NULL
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //drop restaurants table if it exists
        Schema::dropIfExists('restaurants');
    }
}
