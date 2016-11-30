<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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

    public function institution() {
        return $this->belongsToMany('App\Institution', 'institution_user', 'user_id', 'institution_id');
    }

    public function profile_image() {
        return $this->hasOne('App\ProfileImage');
    }

    public function profile_image_or_placeholder() {
        if($this->profile_image_id == '') {
            $placeholder = new ProfileImage;
            $placeholder->prefix = 'placeholder';
            return $placeholder;
        } 
        else {
            return $this->profile_image;
        }
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

    public function getProfileUrlAttribute()
    {
        return action('ProfileController@getProfile',$this->long_id);
    }

}
