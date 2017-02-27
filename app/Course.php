<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function suggested_skills() {
    	return $this->belongsToMany('App\Skill');
    }
}
