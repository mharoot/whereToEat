<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // system_name, display_name, created_at, updated_at
        // create roles table
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');  // role id used to represent role, in role_user
            $table->string('name', 100);    // name of role
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
        // drop roles table if it exists
        Schema::dropIfExists('roles');
    }
}
