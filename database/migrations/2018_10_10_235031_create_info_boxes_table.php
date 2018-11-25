<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_boxes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('brand')->unique()->nullable();
            $table->string('name')->unique();
            $table->string('licence')->nullable();
            $table->unsignedDecimal('turnover')->nullable();
            $table->unsignedDecimal('taxes')->nullable();
            $table->string('fax')->nullable()->unique();
            $table->string('speaker')->nullable();
            $table->string('address')->nullable();
            $table->unsignedDecimal('build')->nullable();
            $table->unsignedDecimal('floor')->nullable();
            $table->unsignedDecimal('apt_nbr')->nullable();
            $table->unsignedDecimal('zip')->nullable();

            $table->integer('city_id')->unsigned()->index();
            //$table->foreign('city_id')->references('id')->on('cities');
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
        Schema::dropIfExists('info_boxes');
    }
}
