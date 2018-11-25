<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_orders', function (Blueprint $table) {
            $table->increments('id');

            $table->string('pu');
            $table->string('ht');
            $table->string('tva');
            $table->string('ttc');

            $table->integer('buy_dv_id')->unsigned()->index();
           // $table->foreign('buy_dv_id')->references('id')->on('buy_dvs');

            $table->integer('buy_bc_id')->unsigned()->index()->nullable();
           // $table->foreign('buy_bc_id')->references('id')->on('buy_bcs');

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
        Schema::dropIfExists('buy_orders');
    }
}
