<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnnormalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returnnormals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('code');
            $table->foreign('code')->references('id')->on('abalats');
            $table->integer('normal_id');
             $table->foreign('normal_id')->references('id')->on('normalcredits');
            $table->float('amount');
            $table->string('month');
            $table->date('creditDate');
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
        //
        Schema::dropIfExists('returnnormals');
    }
}
