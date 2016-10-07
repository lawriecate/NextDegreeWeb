<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class SupportMessage extends Model
{
    public function getStatusAttribute()
    {
    	if($this->resolved_at == null) 
    	{
            $datetime = new Carbon($this->created_at);
    		return 'Needs Response - Recieved ' . $datetime->diffForHumans() . '';
    	}
    	else
    	{
    		$datetime = new Carbon($this->resolved_at);
			$verb = 'Responded to at ';
			return $verb . $datetime->diffForHumans();   
    	}
    }

    public function getAttachmentsAttribute()
    {
        return json_decode($this->attachments_json);
    }
}
