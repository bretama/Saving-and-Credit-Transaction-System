<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnTypeLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_type_loans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('normal_id');
            $table->foreign('normal_id')->references('id')->on('normalcredits');
             $table->float('amount');
            $table->string('month');
            $table->date('creditDate');
            $table->float('remain');
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
        Schema::dropIfExists('return_type_loans');
    }
}
