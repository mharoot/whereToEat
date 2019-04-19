<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255); // by default its 255 if i dont include it
            $table->string('email', 255);//->unique(); // 757 bytes 94 ~ characteers max doesn't work'
            $table->string('password', 60);//60 for bcrpt
            $table->rememberToken(100)->nullable(); // A nullable remember_token column, 100 characters in length (to accommodate “Remember Me” token)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
