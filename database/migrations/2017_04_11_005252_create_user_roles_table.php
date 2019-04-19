<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // user id, role, created_at, updated_at
        // create role_user table
        Schema::create('role_user', function (Blueprint $table) {
            $table->integer('user_id');  // user ID
            $table->tinyInteger('role_id'); // user role represented as tiny int
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
        // drop role_user table if it exists
        Schema::dropIfExists('role_user');
    }
}
