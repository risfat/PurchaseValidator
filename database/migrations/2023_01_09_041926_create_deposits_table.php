<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {

            //iD's

            $table->bigIncrements('id');

            //Payer details

            $table->string('payer_name');
            $table->string('payer_email')->nullable();
            $table->string('payer_phone');

            //Payment Details

            $table->string('payment_for');
            $table->string('payment_method');
            $table->integer('payment_amount');
            $table->string('charge')->default(0);
            $table->string('account_number');
            $table->string('trx_id');

            //Deposit Details
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('deposits');
    }
};
