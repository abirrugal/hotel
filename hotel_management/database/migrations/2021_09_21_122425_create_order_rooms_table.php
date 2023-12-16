<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_rooms', function (Blueprint $table) {
            $table->increments('id')->startingValue(0);
            $table->unsignedInteger('order_room_id');
            $table->unsignedInteger('room_info_id');
            $table->foreign('order_room_id')->references('id')->on('client_regs')->onDelete('cascade');
            $table->foreign('room_info_id')->references('id')->on('room_infos')->onDelete('cascade');
            $table->string('which_branch',30)->nullable();

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
        Schema::dropIfExists('order_rooms');
    }
}
