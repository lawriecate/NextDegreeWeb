<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
	use SoftDeletes;
    /**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
	    return 'slug';
	}

	public function getUrlAttribute() 
	{
		return url('/'.$this->slug);
	}

	public function getStatusAttribute()
	{
		if($this->publish_at == null) {
			return 'Draft';
		} else {
			$datetime = new Carbon($this->publish_at);
			$verb = 'Published ';
			if(strtotime($this->publish_at) > time()) {
				$verb = 'Scheduled ';
			}
			return $verb . $datetime->diffForHumans();  
		}
	}

	public function image()
	{
		return $this->hasOne('App\Image','id','display_image');
	}
}
