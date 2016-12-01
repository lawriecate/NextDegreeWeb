<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Thread extends Model
{

public function getRouteKeyName() {
        return 'long_id';
    }
	public function messages(){
		return $this->hasMany('App\Message', 'thread_id', 'id');
	}
    public function users()
    {
        return $this->morphedByMany('App\User', 'threadable');
    }

    public function getTitleAttribute() {
   		if($this->users->count() == 2) {
   			/*$names='';
   			foreach($this->users as $user) {
   				$names .= $user->name;
   			}
   			
   			return $names;*/
   			return $this->users->where('id','!=',Auth::user()->id)->first()->name;
   		} 
   		
   			return 'Thread';
   		
    }

    public function getUrlAttribute() {
    	return action('MessageController@view',$this->long_id);
    }


}
