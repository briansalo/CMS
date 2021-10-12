<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requestfriend extends Model
{
  
      protected $fillable = [
        'name'
    ];

     public function users()
    {
        return $this->belongsToMany(User::class);
    }

     public function friends()
    {
        return $this->belongsToMany(Friend::class);
    }
}
