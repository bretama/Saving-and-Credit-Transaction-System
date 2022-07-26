<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ReturnTypeLoan extends Model
{
    //
     use SearchableTrait;
      use SoftDeletes;
        protected $fillable =['type_id','accountNum','amount','month','creditDate',];
     protected $dates = ['deleted_at'];
     

}
