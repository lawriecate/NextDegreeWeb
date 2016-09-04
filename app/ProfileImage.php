<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileImage extends Model
{
    public function getSmallUrlAttribute() {
    	return url('profiles/'.$this->prefix.'_100.jpg');
    }

    public function getMediumUrlAttribute() {
    	return url('profiles/'.$this->prefix.'_100.jpg');
    }

   	public function getLargeUrlAttribute() {
    	return url('profiles/'.$this->prefix.'_100.jpg');
    }
}
