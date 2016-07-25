<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;
use App\File;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function files() 
    {
    	return view('admin.files');
    }

    public function uploadFile(Request $request)
    {
    	// allowed
    	//$allowed_files = array('jpg','jpeg','gif','png');
    	$validator;
    	 // getting all of the post data
	    $files = $request->file('files');
	    // Making counting of uploaded images
	    $file_count = count($files);
	    // start count how many uploaded
	    $uploadcount = 0;
	    foreach($files as $file) {
	      $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
	      $validator = Validator::make(array('file'=> $file), $rules);
	      if($validator->passes()){
	        $destinationPath = 'uploads';
	        $filename = $file->getClientOriginalName();
            $new_filename = uniqid() . '_' . $filename;
	        $upload_success = $file->move($destinationPath, $new_filename);
	        $uploadcount ++;

            $file = new File;
            $file->path = $destinationPath . '/' . $new_filename;
            $file->size = filesize($file->path);
            $file->user_id = Auth::user()->id;
            $file->save();
	      }
	    }
	    if($uploadcount == $file_count){
	      //$request->session()->flash('success', 'Upload successfully'); 
	      //return redirect(action('AdminController@files'));
	    return response()->json(['upload_status'=>'success']);
	    } 
	    else {
	    	 return response()->json(['upload_status'=>'fail','upload_errors'=>$validator->messages()],200);
	      //return redirect(action('AdminController@files'))->withInput()->withErrors($validator);
	    }
    }
}
