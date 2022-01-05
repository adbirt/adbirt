<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_purchase', function (Blueprint $table) {
            $table->increments('id');
            $table->double('amount');
            //$table->integer('product_id');
            $table->integer('product_quantity');
            $table->integer('user_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->timestamps();


            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('product_id')
                ->references('id')->on('users')
               // ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::drop('product_purchase');
    }
}
