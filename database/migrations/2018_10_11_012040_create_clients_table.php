<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');

            $table->string('slug')->unique();
            $table->string('description');

            $table->integer('company_id')->unsigned()->index();
            //$table->foreign('company_id')->references('id')->on('companies');

            $table->integer('info_box_id')->unsigned()->index();
            //$table->foreign('info_box_id')->references('id')->on('info_boxes');

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
        Schema::dropIfExists('clients');
    }
}
