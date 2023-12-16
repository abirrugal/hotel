<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientRegsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_regs', function (Blueprint $table) {
            $table->increments('id')->startingValue(0);

            $table->string('number');
            $table->string('guest_name',250);
            $table->string('ref_by',80)->nullable();
            $table->longText('present_address')->nullable();
            $table->longText('permanent_address')->nullable();
            $table->string('email',100)->nullable();
            $table->string('country',60)->nullable();
            $table->string('nid')->nullable();
            $table->string('passport')->nullable();
            $table->longText('visit_purpose')->nullable();
            $table->longText('note')->nullable();
            $table->string('coming_from')->nullable();
            $table->string('next_destination')->nullable();
            $table->string('arrival_date');
            $table->string('departure_date');
            $table->string('age',16)->nullable();
            $table->string('birth_date',100)->nullable();
            $table->string('gender',16)->nullable();
            $table->string('profession',32)->nullable();
            $table->string('pax',16)->nullable();
            $table->string('payment_method',16)->nullable();
            $table->string('check_in_status',16)->default('no');
            $table->string('which_branch',30)->nullable();

            

            // $table->unsignedInteger('room_info_id');

            // $table->foreign('room_info_id')->references('id')->on('room_infos')->onDelete('cascade');

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
        Schema::dropIfExists('client_regs');
    }
}
