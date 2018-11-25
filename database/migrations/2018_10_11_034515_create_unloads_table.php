<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnloadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unloads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('join')->unique();
            $table->string('prince');
            $table->boolean('taxes')->default(0);
            $table->boolean('tva')->default(0);
            $table->integer('accounting_id')->unsigned()->index();
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
        Schema::dropIfExists('unloads');
    }
}
