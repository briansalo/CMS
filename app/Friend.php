<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{

    protected $fillable = [
        'name'
    ];


    public function users()
    {
        return $this->belongsToMany(User::class);
    }

     public function requestfriends()
    {
        return $this->belongsToMany(RequestFriend::class);
    }
}
