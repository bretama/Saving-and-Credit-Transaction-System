<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeLimitedSaving extends Model
{
    //
     use SoftDeletes;
    protected $table = 'time_limited_savings';
    protected $fillable = [
        'accountNum','amount','bank','recipt','sem1','month','interest','interestdate','entrydate','leavedate','total',
    ];
     protected $dates = ['deleted_at'];
    
    public function monthly()
    {
        return $this->belongsTo('App\Abalat');
    }
}
