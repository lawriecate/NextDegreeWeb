<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Message extends Model
{
    public  $primaryKey = 'long_id';
    public $incrementing = false;
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function thread() {
    	return $this->belongsTo('App\Thread');
    }

    public function sender() {
        return $this->hasOne('App\User','id','sender_id');
    }

    public function getFromOrToAttribute(){
    	return ($this->sender_id == Auth::user()->id) ? 'from' : 'to';
    }
}
