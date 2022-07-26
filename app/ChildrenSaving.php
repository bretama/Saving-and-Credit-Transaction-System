<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChildrenSaving extends Model
{
    //
     use SoftDeletes;
    protected $table = 'children_savings';
protected $fillable = ['accountNum','amount','bank','sem1', 'interest','interestdate', 'month', 'entrydate', ];

 protected $dates = ['deleted_at'];
public function abalat(){
	return $this->belongTo('App\Abalat','accountNum');
	}
}
