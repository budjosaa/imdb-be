<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    const REACTIONS = ['like','dislike'];
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function movie()
    {
        return $this->belongsTo('App\Movie');
    }
}
