<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreeInterestSavingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('free_interest_savings', function (Blueprint $table) {
            $table->increments('id');
             $table->string('username');
            $table->string('accountNum');
            $table->foreign('accountNum')->references('code')->on('abalats');
            $table->float('amount');
             $table->string('bank');
             $table->string('recipt')->nullable();
            //$table->float('saving');//80% will be entered to this
            $table->float('sem1')->nullable();
            //$table->float('share');//20% will be entered to this
            $table->string('month');
            $table->date('entrydate');
            $table->string('type');
            // $table->date('leavedate');
            // $table->string('penality');
            // $table->string('interest');
            // $table->float('totalDepositedAmount');
            // $table->float('totalPossibleLoan');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('free_interest_savings');
    }
}
