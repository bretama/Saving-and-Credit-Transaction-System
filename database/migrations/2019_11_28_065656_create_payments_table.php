<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->string('username');
            $table->string('name');
            $table->string('fname');
            $table->string('gfname');
            $table->date('entrydate');
            $table->string('month');
            $table->float('days');

            $table->float('basicSalary');
            $table->float('transportAllowance')->nullable();
            $table->float('houseAllowance')->nullable();
            $table->float('grossEarning')->nullable();
            $table->float('incomeTax')->nullable();
            $table->float('pension1')->nullable();
            $table->float('pension2')->nullable();
            $table->float('totalDiduction')->nullable();
            $table->float('netPay')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
