<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchaseds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('qt');
            $table->string('store_qt');
            $table->integer('product_id')->unsigned()->index();
            $table->integer('accounting_id')->unsigned()->index()->nullable();
            $table->integer('buy_order_id')->unsigned()->index()->nullable();
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
        Schema::dropIfExists('purchaseds');
    }
}
