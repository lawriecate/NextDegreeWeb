<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function users() {
        return $this->belongsToMany('App\User');
    }

    public function businesses() {
        return $this->belongsToMany('App\Business');
    }

    public function getUrlAttribute() {
    	return action('SkillController@public_page',$this->id . '-' . $this->name);
    }
      
}
