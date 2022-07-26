<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penalities', function (Blueprint $table) {
            $table->increments('id');
             $table->string('username');
             $table->string('accountNum');
            $table->foreign('accountNum')->references('code')->on('abalats');
            $table->float('penality');
             $table->string('bank');
             // $table->string('recipt');
            $table->date('entrydate');
            $table->string('month');
            $table->string('type');
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
        Schema::dropIfExists('penalities');
    }
}
