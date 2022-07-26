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
            $table->integer('code');
            $table->foreign('code')->references('id')->on('abalats');
            $table->float('amount');
            $table->string('month');
            $table->string('normal');
            $table->string('type');
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
