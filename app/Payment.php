<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    //
     use SoftDeletes;
    //
  protected $fillable = [
        'name','fname','gfname','entrydate','month','days','basicSalary','transportAllowance','houseAllowance','grossEarning','incomeTax','pension1','pension2','totalDiduction','netPay',
    ];
        protected $dates = ['deleted_at'];
}
