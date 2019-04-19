<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPriceToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // add price column
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('price'); // add the new price column
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // drop price column
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('price'); // remove the price column
        });        
    }
}
