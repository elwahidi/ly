<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountings', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('tva')->default(0);
            $table->string('taxes')->default(0);
            $table->string('profit')->default(0);
            $table->string('taxes_after_unload')->default(0);
            $table->integer('tva_after_unload')->default(0);

            $table->integer('company_id')->unsigned()->index();
           // $table->foreign('company_id')->references('id')->on('companies');

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
        Schema::dropIfExists('accountings');
    }
}
