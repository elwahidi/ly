<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');

            $table->string('slug')->nullable()->unique();

            $table->string('ht');
            $table->string('tva');
            $table->string('ttc');
            $table->string('tva_payed');
            $table->string('profit');
            $table->string('taxes');
            $table->string('profit_after_taxes');

            $table->integer('company_id')->unsigned()->index();
           // $table->foreign('company_id')->references('id')->on('companies');

            $table->integer('trade_action_id')->unsigned()->index();
          //  $table->foreign('trade_action_id')->references('id')->on('trade_actions');

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
        Schema::dropIfExists('sales');
    }
}
