<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePremiumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premiums', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('sold')->default(0)->unsigned();
            $table->integer('range')->default(0)->unsigned();
            $table->date('limit')->nullable();

            $table->integer('category_id')->unsigned()->index();
            //$table->foreign('category_id')->references('id')->on('categories');

            $table->integer('status_id')->unsigned()->index();
            //$table->foreign('status_id')->references('id')->on('statuses');
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
        Schema::dropIfExists('premiums');
    }
}
