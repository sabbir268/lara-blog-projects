<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','is_active','role_id','password','photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function role()
    {
        return $this->belongsTo(Role::class);
    }



    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }


     public function isAdmin()
    {
        if ($this->role->name == 'administrator' && $this->is_active == 1) {
            return true;
        }
    }




}
