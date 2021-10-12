<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function superAdmin()
    {

        return $this->role == 'super_admin';
    }

   public function isAdmin()
    {

        return $this->role == 'admin';
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function friends()
    {
       return $this->belongsToMany(Friend::class)->withTimestamps();
    }

    public function requestfriends()
    {
       return $this->belongsToMany(Requestfriend::class)->withTimestamps();
    }
}
