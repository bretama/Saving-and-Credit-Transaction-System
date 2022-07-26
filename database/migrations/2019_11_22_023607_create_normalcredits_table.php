<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNormalcreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('normalcredits', function (Blueprint $table) {
            $table->increments('id');
             $table->string('username');
            $table->string('idnum');
            $table->string('accountNum');
            $table->foreign('accountNum')->references('code')->on('abalats');
            $table->float('amount');
            $table->string('bank');
            $table->string('month');
            $table->string('normal');
            $table->string('term')->nullable();
            $table->string('type')->nullable();
            $table->date('creditDate');
            $table->date('firstDate');
            $table->date('finalDate');
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
        Schema::dropIfExists('normalcredits');
    }
}
