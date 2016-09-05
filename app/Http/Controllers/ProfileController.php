<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Validator;
use App\File;
use App\User;
use App\JobType;
use App\Student;
use App\Image;
use App\Institution;
use ImageProcessing;
use App\ProfileImage;

class ProfileController extends Controller
{
    public function saveProfile(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->student->bio = $request->bio;
        $user->student->degree = $request->degree;
        $user->student->save();

        $user->save();

        // user job types
        $user->job_types()->detach();
        if(null!==($request->input('jobtype'))) 
        {
            foreach($request->input('jobtype') as $id => $job_type_input) {
                if($job_type_input=="1") {
                    $job_type = JobType::find($id);
                    $user->job_types()->attach($job_type);
                }
            }
        }

        if($request->ajax()){
            return response()->json(array('status'=>'success'));
        }
        return redirect(action('HomeController@index'));
    }


    public function updateProfilePhoto(Request $request)
    {
    	$response = array();
        $response['images'] = array();
        // allowed
        //$allowed_files = array('jpg','jpeg','gif','png');
        $validator;
         // getting all of the post data
        $files = $request->file('files');
        // Making counting of uploaded images
        $file_count = count($files);
        // start count how many uploaded
        $uploadcount = 0;
        $destinationPath = 'profiles';
        foreach($files as $file) {
          $rules = array('file' => 'required|image|mimes:png,gif,jpeg|max:4000'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
          $validator = Validator::make(array('file'=> $file), $rules);
          if($validator->passes()){
            
            $filename = $file->getClientOriginalName();
            $new_filename = uniqid() . '.tmp';
            $upload_success = $file->move($destinationPath, $new_filename);
            $uploadcount ++;

            // insert into DB

            $profileImage = new ProfileImage;
	    	$prefix = uniqid();
	    	   $response['prefix'] = $prefix;
	    	$profileImage->prefix = $prefix;
	    	$profileImage->user_id = Auth::user()->id;
	    	$fullpath =  $destinationPath . '/' . $new_filename;
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

             

          }
        }
        if($uploadcount == $file_count){
          //$request->session()->flash('success', 'Upload successfully'); 
          //return redirect(action('AdminController@files'));
            $response['status'] = 'success';
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

        return response()->json($response);
        } 
        else {
            return response()->json(['status'=>'fail','upload_errors'=>$validator->messages()],200);
          //return redirect(action('AdminController@files'))->withInput()->withErrors($validator);
        }
    }

    public function updateStudentCV(Request $request)
    {
        $response = array();
   
        $validator;
         // getting all of the post data
        $files = $request->file('files');
        // Making counting of uploaded images
        $file_count = count($files);
        // start count how many uploaded
        $uploadcount = 0;
        $destinationPath = 'student_uploads';
        foreach($files as $file) {
          $rules = array('file' => 'required|mimes:pdf'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
          $validator = Validator::make(array('file'=> $file), $rules);
          if($validator->passes()){
            
            $filename = $file->getClientOriginalName();
            $new_filename = uniqid() . '_' . $filename . '.pdf';
            $upload_success = $file->move($destinationPath, $new_filename);
            $uploadcount ++;

            // insert into DB
            $fullpath =  $destinationPath . '/' . $new_filename;
           
            $type = mime_content_type($fullpath);
            if($type == "image/jpeg" || 1) {
            }

             

          }
        }
        if($uploadcount == $file_count){
          //$request->session()->flash('success', 'Upload successfully'); 
          //return redirect(action('AdminController@files'));
            $response['status'] = 'success';
           
            $user = Auth::user();
            if($user->student->cv_path != null) {
                unlink($user->student->cv_path);
            }
            $user->student->cv_path = $fullpath;
            $user->student->cv_uploaded_at = date('Y-m-d H:i:s');
            $user->student->save();

        return response()->json($response);
        } 
        else {
            return response()->json(['status'=>'fail','upload_errors'=>$validator->messages()],200);
          //return redirect(action('AdminController@files'))->withInput()->withErrors($validator);
        }
    }

    public function resetStudentProfile(Request $request) 
    {
        $user = User::findOrFail($request->user_id);
        $profile;
        if(is_null($user->student)) {
            $profile = new Student;
            $profile->user_id=$user->id;
        } 
        else
        {
            $profile = $user->student;
        }
        $institution = Institution::find($request->institution_id);
        $profile->institution()->associate($institution);
        $profile->save();
        return response()->json(array('status'=>'success','institution_name'=>$institution->name));
    }
}