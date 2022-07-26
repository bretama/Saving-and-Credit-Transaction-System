<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;


class TypeLoan extends Model
{
    //
     use SearchableTrait;
      use SoftDeletes;
     protected $fillable =['accountNum','amount','creditDate','firstDate','finalDate','month',];
     protected $dates = ['deleted_at'];
   
   public function type()
    {
    	return $this->belongsTo('App\Abalat');
    }
     public function return()
    {
    	return $this->hasMany('App\ReturnTypeLoan');
    }
}
