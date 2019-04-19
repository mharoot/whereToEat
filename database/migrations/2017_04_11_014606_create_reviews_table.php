<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        /*
            Rating (should be able to rate a restaurant between 1 and 5 stars)
            Review tagline (one-line summary of the review)
            Review content (full body text of the review)
        */
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');    // auto-incrementing integer ID and primary key
            $table->integer('restaurant_id');
            $table->integer('reviewer_id');
            $table->tinyInteger('rating'); // 5 star scale
            $table->string('tagline', 300);
            $table->string('content', 1000);
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
        //
        Schema::dropIfExists('reviews');
    }
}
