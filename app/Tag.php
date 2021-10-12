<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    public function posts() //make sure it's plural because in every tag can have many post
    {
    	return $this->belongsToMany(Post::class);
    }
}
