<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function posts() //make sure it's plural because in every category can have many posts
    {
    	return $this->hasMany(Post::class);
    }
}
