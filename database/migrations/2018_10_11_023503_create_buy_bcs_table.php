<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyBcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_bcs', function (Blueprint $table) {
            $table->increments('id');

            $table->string('qt');

            $table->integer('buy_id')->unsigned()->index();
            //$table->foreign('buy_id')->references('id')->on('buys');

            $table->integer('product_id')->unsigned()->index();
           // $table->foreign('product_id')->references('id')->on('products');

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
        Schema::dropIfExists('buy_bcs');
    }
}
