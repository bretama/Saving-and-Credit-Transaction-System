<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FreeInterestSaving extends Model
{
    //
     use SoftDeletes;
    protected $table = 'free_interest_savings';
    protected $fillable = ['accountNum','amount','bank','recipt','sem1', 'month', 'entrydate','type',];
      protected $dates = ['deleted_at'];
    public function abalat(){
	return $this->belongTo('App\Abalat','accountNum');
	}
}
