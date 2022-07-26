<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChldrenRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chldren_registrations', function (Blueprint $table) {
           // $table->increments('id');
            $table->integer('code')->primary();
            
           $table->string('name');
            $table->string('fname');
            $table->string('gfname');
            $table->string('mname');
            $table->string('gender');
            $table->string('receipt');
            $table->string('bank');
            $table->string('werasi');
            $table->date('dob');
            $table->string('type');
            $table->string('wereda');
            $table->string('town');
            $table->string('qebelie');
            $table->string('phone');
            $table->string('occupation');
            $table->string('edulevel');
            $table->string('account');
            $table->date('entrydate');
            $table->date('leavedate');
            $table->string('idea');
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
        Schema::dropIfExists('chldren_registrations');
    }
}
