<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Penality extends Model
{
	 use SoftDeletes;
	 protected $fillable = ['username','accountNum','penality','bank','entrydate','month','type',];
      protected $dates = ['deleted_at'];
     public function penality()
    {
        return $this->belongsTo('App\Abalat');
    //
}
}
