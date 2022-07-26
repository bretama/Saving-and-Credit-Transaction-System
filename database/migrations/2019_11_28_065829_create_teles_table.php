<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teles', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->string('username');
            $table->string('name');
            $table->string('fname');
            $table->string('gfname');
            $table->float('amount');
            $table->float('numdays');
            $table->string('receipt')->nullable();
          
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
        Schema::dropIfExists('teles');
    }
}
