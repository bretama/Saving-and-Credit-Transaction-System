<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Share extends Model
{
	use SoftDeletes;
    //
     protected $fillable = [
        'code','amount','month','bank','recipt','entrydate',
    ];
     protected $dates = ['deleted_at'];
}
