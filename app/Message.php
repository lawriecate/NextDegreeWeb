<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public  $primaryKey = 'long_id';
    public $incrementing = false;

    public function thread() {
    	return $this->belongsTo('App/Thread');
    }
}
