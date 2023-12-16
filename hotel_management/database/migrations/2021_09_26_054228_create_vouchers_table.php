<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->increments('id')->startingValue(0);
            $table->string('name');
            $table->string('transaction_date');
            $table->string('voucher_ref')->nullable();
            $table->string('chequeissue_date')->nullable();
            $table->string('account_no')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('pay_method')->nullable();
            $table->string('voucher_type');
            $table->string('trans_mode')->nullable();
            $table->string('branch')->nullable();
            $table->longText('description')->nullable();
            $table->string('invoice_ref')->nullable();
            $table->decimal('ammount')->nullable();
            $table->string('status');
            $table->unsignedInteger('client_reg_id');
            $table->foreign('client_reg_id')->references('id')->on('client_regs')->onDelete('cascade');
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
        Schema::dropIfExists('vouchers');
    }
}
