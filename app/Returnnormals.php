<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Returnnormals extends Model
{
    //
    use SoftDeletes;
    //
    protected $fillable =['normal_id','amount','month','bank','recipt','creditDate','remain'];
     protected $dates = ['deleted_at'];
}
