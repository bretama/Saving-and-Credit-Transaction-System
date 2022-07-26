<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abels', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->string('username');
            $table->string('name');
            $table->string('fname');
            $table->string('gfname');
             $table->date('entrydate');
             $table->string('month');
          $table->float('numdays');
           
            $table->float('perday');
            
            $table->float('forbed')->nullable();
            $table->float('taxi')->nullable();
            $table->string('receipt')->nullable();
            $table->float('total');
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
        Schema::dropIfExists('abels');
    }
}
