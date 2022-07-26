<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Comission extends Model
{
    //
    use SoftDeletes;
    //
  protected $fillable = [
        'name','fname','gfname','entrydate','month','typedone','numcoming','forone','total',
    ];
        protected $dates = ['deleted_at'];
}
