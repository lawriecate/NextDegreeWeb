<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function skills() {
        return $this->belongsToMany('App\Skill','skill_business');
    }

    public function getSkillsStringAttribute()
    {
        $output = '';
        $skills = $this->skills;
        foreach($skills as $skill) {
            $output .= $skill->name .', ';
        }
        return $output;
    }
}
