<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $guarded= ['id'];
        
    public function likes()
    {
    return $this->hasMany('App\Like');
    }
}
