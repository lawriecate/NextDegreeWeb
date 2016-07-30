<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function getUrlAttribute()
    {
    	return url($this->path);
    }

    public function image()
    {
    	return $this->hasOne('App\Image');
    }
}
