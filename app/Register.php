<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Register extends Model
{
    //
    use SoftDeletes;
	 protected $fillable = ['name','fname','gfname','username','password',];
      protected $dates = ['deleted_at'];
    
}
