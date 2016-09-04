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
		return action('PostController@show',$this->slug);
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

	public function getPreviewImageUrlAttribute()
	{
		if(is_null($this->image)) {
			return url('assets/images/article.gif');
		} 
		else
		{
			return $this->image->thumbnail->path;
		}
	}

	public static function stream()
	{
		return Post::where('publish_at','<=',date('Y-m-d H:i:s'))->orderBy('publish_at','desc');
	}
}
