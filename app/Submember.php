<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Submember extends Model
{
	 use SoftDeletes;
    //
     protected $table = 'submembers';
    protected $fillable = [
        'accountNum','name','fname','number',
    ];
     protected $dates = ['deleted_at'];
    public function monthly()
    {
        return $this->belongsTo('App\Abalat');
    }
}
