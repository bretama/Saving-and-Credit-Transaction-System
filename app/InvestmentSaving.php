<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvestmentSaving extends Model
{
	 use SoftDeletes;
    //
    protected $table = 'investment_savings';
       protected $fillable = ['accountNum','amount','bank','recipt', 'sem1', 'month', 'interest','entrydate','interestdate',];
        protected $dates = ['deleted_at'];
      
    public function abalat(){
	return $this->belongTo('App\Abalat','accountNum');
	}
}
