<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChildrenRegistration extends Model
{
    //
     use SoftDeletes;
    //
  protected $fillable = [
        'code','name','fname','gfname','mname','gender','receipt','bank','werasi','dob','type','wereda','town','qebelie','phone','occupation','edulevel','account','entrydate','leavedate','idea',
    ];
        protected $dates = ['deleted_at'];

	

 public function children(){
	return $this->hasMany('App\ChildrenSaving','code');
	}
}
