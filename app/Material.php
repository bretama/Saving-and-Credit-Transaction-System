<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    //
     use SoftDeletes;
  

    protected $fillable =['type','numma','moneyToBuy','nameOfBuyer','sum','date','month',];
     protected $dates = ['deleted_at'];

     
}
