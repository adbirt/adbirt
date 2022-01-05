<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordResetNewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passwordreset', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('token')->nullable();
            $table->integer('counter')->default(0);

            $table->integer('user_id')->unsigned()->nullable(); // i want to track users who reset and how many times
            $table->foreign('user_id')->references('id')->on('users');
            // ondelete cascade ar on update not used .... beacause i want to keep track of users
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
        Schema::drop('passwordreset');
    }
}
