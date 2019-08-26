<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalcResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calc_result', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kunden_id');
            $table->string('loan_period');
            $table->string('payment_month');
            $table->string('payment_year');
            $table->string('payment_discount')->default('0,00');
            $table->string('borrowing_rate');
            $table->string('montly_deposit_val');
            $table->string('annual_unsheduled_month');
            $table->string('annual_unsheduled_year');
            $table->string('annual_unsheduled_val');
            $table->string('annual_to_month')->nullable();
            $table->string('annual_to_year')->nullable();
            $table->string('onetime_unsheduled_month');
            $table->string('onetime_unsheduled_year');
            $table->string('onetime_unsheduled_val');
            $table->string('new_borrowing_rate');
            $table->string('new_repayment_rate_inp');
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
        Schema::dropIfExists('calc_result');
    }
}