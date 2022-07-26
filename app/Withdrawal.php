<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Withdrawal extends Model
{
            
      use SoftDeletes;
    //
  protected $fillable = [
        'accountNum','type','amount','month','withdrawalDate',
    ];
        protected $dates = ['deleted_at'];
}
