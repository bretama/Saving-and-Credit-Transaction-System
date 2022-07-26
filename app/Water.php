<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Nicolaslopezj\Searchable\SearchableTrait;
class Water extends Model
{
    //
     use SearchableTrait;
      use SoftDeletes;
    //
      protected $searchable = [
       'columns' => [
       'waters.name' =>'10',
       'waters.fname' =>'10',
       'waters.gfname'=>'10',
       'waters.entrydate'=>'10',
       'waters.month'=>'10',
       'waters.number'=>'10',
       'waters.perone'=>'10',
       'waters.total'=>'10'
       ]
      ];
  protected $fillable = [
        'name','fname','gfname','entrydate','month','number','perone','total',
    ];
        protected $dates = ['deleted_at'];
}
