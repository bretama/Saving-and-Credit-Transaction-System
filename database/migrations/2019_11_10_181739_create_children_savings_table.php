<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildrenSavingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children_savings', function (Blueprint $table) {
            $table->increments('id');
             $table->string('username');
            $table->string('accountNum');
            $table->foreign('accountNum')->references('code')->on('abalats');
            $table->float('amount');
             $table->string('bank');
             // $table->string('recipt');
            $table->float('sem1')->nullable();
            $table->float('interest');
            $table->date('interestdate');
            $table->string('month');
            $table->date('entrydate');
            // $table->date('leavedate');
            //$table->float('totalDepositedAmount');
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
        Schema::dropIfExists('children_savings');
    }
}
