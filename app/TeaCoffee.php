<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeaCoffee extends Model
{
    //
     use SoftDeletes;
    //
  protected $fillable = [
        'name','fname','gfname','entrydate','month','type','totalnum','forone','total',
    ];
        protected $dates = ['deleted_at'];
}
