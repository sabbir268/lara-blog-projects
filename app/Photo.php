<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable =[
    	'file'
    ];

    protected $path = '/images/';

    public function user()
    {
    	return $this->hasMany(User::class);
    }

    public function getFileAttribute($value)
    {
    	return $this->path.$value;
    }
}
