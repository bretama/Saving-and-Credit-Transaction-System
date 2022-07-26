<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnNormalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_normals', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->string('username');
            $table->string('normal_id');
            $table->foreign('normal_id')->references('id')->on('normalcredits');
             $table->float('amount');
             $table->float('interest');
            $table->string('month')->nullable();
             $table->string('bank');
             // $table->string('recipt');
            $table->date('creditDate')->nullable();
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
        Schema::dropIfExists('return_normals');
    }
}
