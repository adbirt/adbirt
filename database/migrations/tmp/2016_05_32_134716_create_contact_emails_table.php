<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactEmailsTable extends Migration
{
    /**
     * Run the migrations.
     * id,name,email,message,created_at,updated_at
     * @return void
     */
    public function up()
    {
        Schema::create('contact_emails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('login');
            $table->string('email');
            $table->string('message');
            //$table->string('created_at');
            //$table->string('updated_at');
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
        Schema::drop('contact_emails');
    }
}