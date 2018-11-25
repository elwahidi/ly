<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleDvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_dvs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->integer('sale_id')->unsigned()->index();;
            $table->integer('client_id')->unsigned()->index();;
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
        Schema::dropIfExists('sale_dvs');
    }
}
