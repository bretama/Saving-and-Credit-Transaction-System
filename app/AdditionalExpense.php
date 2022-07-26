<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdditionalExpense extends Model
{
    //
      use SoftDeletes;
    //
  protected $fillable = [
        'name','fname','gfname','entrydate','month','type','amount','numdays','receipt',
    ];
        protected $dates = ['deleted_at'];
}
