<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbalatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // ተ.ቁ ሽም ኣባላት ዕድመ ፆታ  በዝሒ ስድራ ተባ/ኣን/ድምር   ኣድራሻ    ስልኪ     ስራሕ ደረጃ ት/ቲ ኮድ  ሒሳብ ቁጽሪ ዝኣተወሉ ዕለት   ዝተሰናበተሉ ዕለት     ፊርማ መብርሂ

    public function up()
    {
        Schema::create('abalats', function (Blueprint $table) {
         // $table->increments('id');
          $table->integer('id');
           // $table->string('username');
          $table->string('code')->primary();
           $table->string('name')->nullable();
            $table->string('fname')->nullable();
            $table->string('gfname')->nullable();
            $table->string('mname')->nullable();
            $table->mediumText('image')->nullable();
            $table->string('gender')->nullable();
            $table->float('rbirr')->nullable();
            $table->string('receipt')->nullable();
            $table->string('bank')->nullable();
            $table->string('werasi')->nullable();
            $table->string('idnum')->nullable();
            $table->date('idgiven')->nullable();

            $table->date('dob')->nullable();
            $table->string('type')->nullable();
            $table->string('wereda')->nullable();
            $table->string('town')->nullable();
            $table->string('qebelie')->nullable();
            // $table->string('');
            $table->string('phone')->nullable();
            $table->string('occupation')->nullable();
             $table->string('child')->nullable();
            //$table->string('mchild');
            $table->string('edulevel')->nullable();
          
            $table->integer('numfe')->nullable();
            $table->integer('nummale')->nullable();
            $table->integer('total')->nullable();
            $table->date('entrydates')->nullable();
            $table->date('leavedate')->nullable();
            $table->string('idea')->nullable();
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
        Schema::dropIfExists('abalats');
    }
}
