<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submembers', function (Blueprint $table) {
            $table->increments('id');
             $table->string('username');
            $table->string('accountNum');
            $table->foreign('accountNum')->references('code')->on('abalats');
            $table->string('name');
            $table->string('fname');
            $table->date('entrydate');
            $table->integer('number');
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
        Schema::dropIfExists('submembers');
    }
}
