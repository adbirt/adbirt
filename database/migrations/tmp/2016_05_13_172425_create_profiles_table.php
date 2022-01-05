<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            // $table->string('birthday');
            $table->string('aboutmyself');
            $table->string('gender');
            // $table->string('age');
            $table->string('propic')->default('uploads/demo.png');
            // $table->string('address');
            $table->string('state');
            $table->string('city');
			$table->string('profession');
			$table->string('protype');
            $table->string('fb');
            $table->string('twitter');
            $table->string('gp');
            $table->string('personal_site');
            $table->string('instagram');
            $table->string('aboutme');
            $table->string('linkedin');
            $table->string('pinterest');

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('profiles');
    }
}
