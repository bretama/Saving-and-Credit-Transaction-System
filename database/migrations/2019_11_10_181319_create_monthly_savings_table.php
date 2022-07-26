<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthlySavingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_savings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('accountNum');
            $table->foreign('accountNum')->references('code')->on('abalats');
            $table->float('saving');//80% will be entered to this
             $table->string('bank');
             // $table->string('recipt')->nullable();
            $table->float('sem1')->nullable();
            $table->float('share');//20% will be entered to this
            $table->string('month');
            $table->float('amount');
            $table->date('entrydate');
            //$table->string('penality');
            $table->float('interest');
            $table->date('interestdate');
            // $table->float('sumsaving')->nullable();
            // $table->float('sumshare')->nullable();
            // $table->float('sumamount')->nullable();
            // $table->float('suminterestsaving')->nullable();
            $table->string('type');
            // $table->date('leavedate');
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
        Schema::dropIfExists('monthly_savings');
    }
}
