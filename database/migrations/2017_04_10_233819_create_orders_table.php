<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
/*-----------------------------------------------------------------------------
|           php artisan make:migration your_table_name
|------------------------------------------------------------------------------
|
| 1. Go to the console line in xampp and type:
|                                               cd htdocs/whereToEat
|
| 2. For this class to be auto generated with up and down functions included we 
|     used the following command:
|                                    php artisan make:migration create_orders_table
|
*/
class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     * To run all migrations that have not yet been run, you may issue the following command:
     *          php artisan migrate 
     *
     * @return void
     */
    public function up()
    {
        // create orders table
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');    // auto-incrementing integer ID and primary key
            $table->integer('user_id');  // user ID that created the order
            $table->string('name', 255); // name of the order
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
        // drop orders table
        Schema::drop('orders');
    }
}
