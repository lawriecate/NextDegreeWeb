<?php

namespace App;
use Auth;
use App\ProfileImage;
use Validator;
use ImageProcessing;

use Laravel\Socialite\Contracts\User as ProviderUser;

class ProfileImageService
{
	public function saveNewProfileImage($file)
	{

        $validator;


       
        $destinationPath = 'profiles';
        
          $rules = array('file' => 'required|image|mimes:png,gif,jpeg|max:4000'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'

            $filename = basename($file);
            $new_filename = uniqid() . '.tmp';
            //$upload_success = $file->move($destinationPath, $new_filename);
            $fullpath =  $destinationPath . '/' . $new_filename;
            $upload_success=rename($file,$fullpath);
           

            // insert into DB

            $profileImage = new ProfileImage;
	    	$prefix = uniqid();
	    	  
	    	$profileImage->prefix = $prefix;
	    	$profileImage->user_id = Auth::user()->id;
	    	
            /*$file->path = $destinationPath . '/' . $new_filename;
            $file->original_name = $filename;
            $file->size = filesize($file->path);
            $file->user_id = Auth::user()->id;
            $file->save();*/

            //$file_json = array('original_name'=>$filename,'id'=>$file->id,'path'=>$file->path);
            // check is image for initial processing
            $type = mime_content_type($fullpath);
            if($type == "image/jpeg" || $type == "image/jpg" || $type == "image/gif" || $type == "image/png") {
                /*$image = new Image;
                $image->file_id = $file->id;

                

                $image->original_width = $imo->width();
                $image->original_height = $imo->height();
                $image->save();*/
                $imo = ImageProcessing::make($fullpath);
                
                //$response['images']=array();
                foreach(array(800,300,100) as $size) {
                	$imarray = array();
                    try {
                      $imo->fit($size, $size, function ($constraint) {
                        
                        $constraint->upsize();
                    });
                    $thumb_path = $destinationPath . '/'. $prefix.'_'.$size.'.jpg' ;
                    $imo->save($thumb_path, 85);
                    $imarray[$size] = array('path'=>$thumb_path,'size'=>$size); 
                    //$response['images'][] = $imarray;
 
                    } catch (Exception $e) {
                        
                    }
                    
                }
                unlink($fullpath);
                //$image->image_cache_json = json_encode($imarray);

               
                //$file_json['image'] = array('id'=>$image->id,'width'=>$image->original_width,'height'=>$image->original_height,'large'=>$image->generateResize(1200),'thumbnail'=>$image->generateResize(300));
            }

             

            $profileImage->save();
            $user = Auth::user();
            if($user->profile_image_id != null) {
            	$old = ProfileImage::findOrFail($user->profile_image_id);
            	unlink($destinationPath . '/'.$old->prefix.'_100.jpg');
            	unlink($destinationPath . '/'.$old->prefix.'_300.jpg');
            	unlink($destinationPath . '/'.$old->prefix.'_800.jpg');
            	$old->delete();
            }
            $user->profile_image_id = $profileImage->id;
            $user->save();
            return true;
         

           
	}
}