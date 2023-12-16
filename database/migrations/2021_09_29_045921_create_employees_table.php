<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name',200);
            $table->string('department',150);
            $table->string('section',150);
            $table->string('designation',150);
            $table->string('join_date',150);
            $table->string('shift_name',150);
            $table->string('salary_range',150);
            $table->string('concern',150);
            $table->string('branch',150);
            $table->string('bank_no',150);
            $table->string('status',150)->default('Active');
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
        Schema::dropIfExists('employees');
    }
}
