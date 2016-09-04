<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function institution() {
    	return $this->belongsTo('App\Institution');
    }

    public function getCvUploadedAtHumanAttribute()
    {
    	$d = new Carbon($this->cv_uploaded_at);
    	return $d->diffForHumans();
    }

    public function getCvUrlAttribute()
    {
    	return url($this->cv_path);
    }
}
