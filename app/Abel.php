<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;


class Abel extends Model
{
    //
    use SoftDeletes;
    //
  protected $fillable = [
        'name','fname','gfname','entrydate','month','numdays','perday','forbed','taxi','receipt','total',
    ];
        protected $dates = ['deleted_at'];
}
