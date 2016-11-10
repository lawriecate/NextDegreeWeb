<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','long_id'
    ];

    protected $casts = [
        'admin' => 'boolean',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'verification_token', 'verified','created_at','updated_at','email','admin'
    ];

    public function student() {
        return $this->hasOne('App\Student');
    }


    public function business() {
        return $this->hasOne('App\Business');
    }

    public function profile_image() {
        return $this->hasOne('App\ProfileImage');
    }

    public function job_types() {
        return $this->belongsToMany('App\JobType');
    }

    public function skills() {
        return $this->belongsToMany('App\Skill');
    }
    
    public function social_accounts() {
        return $this->hasMany('App\SocialAccount');
    }

}
