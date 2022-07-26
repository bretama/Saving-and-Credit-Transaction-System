<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoluntarySavingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voluntary_savings', function (Blueprint $table) {
            $table->increments('id');
             $table->string('username');
            $table->string('accountNum');
            $table->foreign('accountNum')->references('code')->on('abalats');
            $table->float('amount');
             $table->string('bank');
             // $table->string('recipt');
            $table->float('sem1')->nullable();
            $table->string('month');
            $table->float('interest');
            $table->date('entrydate');
            $table->date('interestdate');
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
        Schema::dropIfExists('voluntary_savings');
    }
}
