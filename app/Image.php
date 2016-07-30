<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\File;
use ImageProcessing;
class Image extends Model
{
	protected $appends = ['original_name','thumbnail'];
	protected $hidden = ['image_cache_json'];
	public function getImageCacheAttribute() {
		return json_decode($this->image_cache_json);	
	}

	public function setImageCacheAttribute($value) {
		$this->attributes['image_cache_json'] = json_encode($value);
	}

	public function file() {
		return $this->belongsTo('App\File');
	}

	public function getOriginalNameAttribute() {
		return $this->file->original_name;
	}

	public function getThumbnailAttribute() {
		return $this->resizedImage(300);
		//return $this->image_cache_json->{"300"};
	}

	public function resizedImage($width) {
		if(isset($this->image_cache->{$width})) {
			return $this->image_cache->{$width};
		} else {
			return $this->generateResize($width);
		}
	}

	public function generateResize($width) {
		$file = $this->file;
		$destinationPath = 'uploads';
		$new_filename = uniqid().'_'.$file->original_name;
		$imo = ImageProcessing::make($file->path);
        $imarray = $this->image_cache;
        if($imarray == null) { $imarray = new \stdClass();}
        try {
              $imo->resize($width, 2000, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        $thumb_path = $destinationPath . '/'. $width.'_'.$new_filename ;
        $imo->save($thumb_path, 85);
        $image = new \stdClass();
		$image->path = $thumb_path;
		$image->width = $width;
		$image->height = $imo->height();
        $imarray->{$width} = $image;
        } catch (Exception $e) {
            return false;
        }
       
        $this->image_cache = $imarray;
        $this->save();
        return $imarray->$width;
	}
}
