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
        return $this->morphedByMany('App\User', 'threadable')->withPivot('last_read_message_id');
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

    public function new_messages() {
        $last_read_message_id = $this->users->where('id',Auth::user()->id)->first()->pivot->last_read_message_id;
        $count = $this->messages->where('id','>',$last_read_message_id)->count();
        return $count;

        //return $last_message_id-$last_read_message_id;
      //return $this->message->get()->where('read','false')->count();
      //return $this->hasMany('App\Message', 'thread_id', 'id')->where('read','false');
    }


}
