<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('room_infos', function (Blueprint $table) {
            $table->increments('id')->startingValue(0);
            $table->integer('room_no');
            $table->string('room_category');
            $table->string('status',200);
            $table->string('floor_no', 200);
            $table->string('service', 200)->nullable();
            $table->string('product_name', 200);
            $table->decimal('room_rate');
            $table->string('clean_sts', 200)->nullable();
            $table->string('last_clean', 200)->nullable();
            $table->string('room_sts', 200)->default('Free');
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
        Schema::dropIfExists('room_infos');
    }
}
