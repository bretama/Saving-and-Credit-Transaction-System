<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MonthlySaving extends Model
{
     use SoftDeletes;
    //
    protected $table = 'monthly_savings';
    protected $primarykey='id';

    protected $fillable =['username','accountNum','saving','bank','sem1','share','month','amount','entrydate','interest','interestdate',];
    //'sumsaving','sumshare','sumamount','suminterestsaving','type','leavedate',
     protected $dates = ['deleted_at'];
     //public $primaryKey='id';
    //public $incrementing = true;
    //public $timestamp=true;

     

    public function thismonth()
    {
    	return $this->belongsTo('App\Abalat');
    }

}
