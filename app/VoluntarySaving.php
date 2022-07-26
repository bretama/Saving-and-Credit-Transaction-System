<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VoluntarySaving extends Model
{
    //
     use SoftDeletes;
    protected $table = 'voluntary_savings';
    protected $fillable = [
        'accountNum','amount','bank','sem1','month','interest', 'entrydate','interestdate',
    ];
     protected $dates = ['deleted_at'];
     
    public function monthly()
    {
        return $this->belongsTo('App\Abalat');
    }
}
