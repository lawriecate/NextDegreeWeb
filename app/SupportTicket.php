<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class SupportTicket extends Model
{
    public function messages()
    {
        return $this->hasMany('App\SupportMessage');
    }

    public function getStatusAttribute()
    {
    	$last = $this->messages()->get()->last();
    	if( $last->is_incoming)
    	{
    		return 'Awaiting reply since <time class="htr" datetime="'.date("c",strtotime($last->created_at)).'" title="'.$last->created_at.'">'.$last->created_at.'</time>';
    	}
    	else
    	{
    		return 'Responded to <time class="htr" datetime="'.date("c",strtotime($last->created_at)).'" title="'.$last->created_at.'">'.$last->created_at.'</time>';
    	}
    }
}
