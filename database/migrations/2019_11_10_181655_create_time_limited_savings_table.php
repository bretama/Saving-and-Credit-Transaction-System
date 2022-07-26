<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeLimitedSavingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_limited_savings', function (Blueprint $table) {
            $table->increments('id');
             $table->string('username');
            $table->string('accountNum');
            $table->foreign('accountNum')->references('code')->on('abalats');
            $table->float('amount');
             $table->string('bank');
             $table->string('recipt');
            $table->float('sem1')->nullable();
            $table->string('month');
            $table->float('interest');
            $table->float('total');
            $table->date('interestdate');
            $table->date('entrydate');
            $table->date('leavedate');
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
        Schema::dropIfExists('time_limited_savings');
    }
}
