<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdditionalExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->string('username');
            $table->string('name');
            $table->string('fname');
            $table->string('gfname');
            $table->date('entrydate');
             $table->string('month');
            $table->string('type');
            $table->float('amount');
            $table->float('numdays')->nullable();
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
        Schema::dropIfExists('additional_expenses');
    }
}
