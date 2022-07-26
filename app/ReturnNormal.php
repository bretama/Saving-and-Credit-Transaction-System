<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ReturnNormal extends Model
{
	 use SoftDeletes;
    //
    protected $fillable =['normal_id','amount','interest','month','bank','creditDate','remain'];
     protected $dates = ['deleted_at'];
    //
}
