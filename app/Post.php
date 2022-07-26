<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    const NOT_ACTIVE = 'not_active';
const ACTIVE = 'active';
    protected $fillable = [
        'title', 'body'
    ];
}
