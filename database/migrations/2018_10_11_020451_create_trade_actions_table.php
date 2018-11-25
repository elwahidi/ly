<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTradeActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trade_actions', function (Blueprint $table) {
            $table->increments('id');

            $table->boolean('bc')->default(0);
            $table->integer('bc_member_id')->unsigned()->nullable();
            $table->string('bc_time')->nullable();

            $table->boolean('dv')->default(0);
            $table->integer('dv_member_id')->unsigned()->nullable();
            $table->string('dv_time')->nullable();

            $table->boolean('done')->default(0);
            $table->integer('done_member_id')->unsigned()->nullable();
            $table->string('done_time')->nullable();

            $table->boolean('delivery')->default(0);
            $table->integer('delivery_member_id')->unsigned()->nullable();
            $table->string('delivery_time')->nullable();

            $table->boolean('store')->default(0);
            $table->integer('store_member_id')->unsigned()->nullable();
            $table->string('store_time')->nullable();

            $table->string('bl')->nullable();
            $table->integer('bl_member_id')->unsigned()->nullable();
            $table->string('bl_time')->nullable();

            $table->string('fc')->nullable();
            $table->integer('fc_member_id')->unsigned()->nullable();
            $table->string('fc_time')->nullable();

            $table->string('status')->default('progress');

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
        Schema::dropIfExists('trade_actions');
    }
}
