<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Normalcredit extends Model
{
    //
     protected $fillable =['id','accountNum','amount','bank','creditDate','firstDate','finalDate','month','normal','term','type',];
     protected $dates = ['deleted_at'];
   
   public function normal()
    {
    	return $this->belongsTo('App\Abalat');
    }

}
