<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comissions', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->string('username');
             $table->string('name');
            $table->string('fname');
            $table->string('gfname');
            $table->date('entrydate');
             $table->string('month');
            $table->string('typedone');
            
            $table->float('numcoming')->nullable();
            $table->float('forone');
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
        Schema::dropIfExists('comissions');
    }
}
