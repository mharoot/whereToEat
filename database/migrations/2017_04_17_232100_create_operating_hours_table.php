<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperatingHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operating_hours', function (Blueprint $table) {
            $table->integer('restaurant_id')->unique();
            $table->string('monday', 16)->nullable(); // '10:00am,11:00pm' => opening closing
            $table->string('tuesday', 16)->nullable();
            $table->string('wednesday', 16)->nullable();
            $table->string('thursday', 16)->nullable();
            $table->string('friday', 16)->nullable();
            $table->string('saturday', 16)->nullable();
            $table->string('sunday', 16)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operating_hours');
    }
}
