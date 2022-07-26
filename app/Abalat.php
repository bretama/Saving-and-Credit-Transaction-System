<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Abalat extends Model
{
	 use SoftDeletes;
    //
  protected $fillable = [
        'id','code','name','fname','gfname','mname','image','gender','rbirr','receipt','bank','werasi','idnum','idgiven','dob','type','wereda','town','qebelie','phone','occupation','child',
       'edulevel','numfe','nummale','total','entrydates','leavedate','idea',
    ];
        protected $dates = ['deleted_at'];

    //public $primaryKey='code';
    // public $incrementing = false;
    // public $timestamp=true;

    // protected $primaryKey = 'code';
	

	 public function monthly(){
	return $this->hasMany('App\MonthlySaving','id');
	}
	public function children(){
		return $this->hasMany('App\ChildrenSaving','id');
	}
	public function freeInterest(){
		return $this->hasMany('App\FreeInterestSaving','id');
	}
	public function voluntary(){
		return $this->hasMany('App\VoluntarySaving','id');
	}
	public function investment(){
		return $this->hasMany('App\InvestmentSaving','id');
	}
	public function timelimited(){
		return $this->hasMany('App\TimeLimitedSaving','id');
	}

	 public function penality(){
	return $this->hasMany('App\Penality','id');
	}
	 public function normal()
    {
    	return $this->hasMany('App\Normalcredit','id');
    }
    }
