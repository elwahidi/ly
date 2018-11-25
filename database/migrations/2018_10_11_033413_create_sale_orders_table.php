<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pu');
            $table->string('ht');
            $table->string('tva');
            $table->string('ttc');
            $table->string('tva_payed');
            $table->string('profit');
            $table->string('taxes');
            $table->string('profit_after_taxes');
            $table->integer('sale_dv_id')->unsigned()->index();
            $table->integer('sale_bc_id')->unsigned()->index();
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
        Schema::dropIfExists('sale_orders');
    }
}
