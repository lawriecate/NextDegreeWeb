<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use Validator;
use App\File;
use App\Image;
use ImageProcessing;

class FileController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.files');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = array();
        $response['files'] = array();
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

            // insert into DB

            $file = new File;
            $file->path = $destinationPath . '/' . $new_filename;
            $file->original_name = $filename;
            $file->size = filesize($file->path);
            $file->user_id = Auth::user()->id;
            $file->save();

            $file_json = array('original_name'=>$filename,'id'=>$file->id,'path'=>$file->path);
            // check is image for initial processing
            $type = mime_content_type($file->path);
            if($type == "image/jpeg" || $type == "image/jpg" || $type == "image/gif" || $type == "image/png") {
                $image = new Image;
                $image->file_id = $file->id;

                $imo = ImageProcessing::make($file->path);

                $image->original_width = $imo->width();
                $image->original_height = $imo->height();
                $image->save();
                //$imarray = array();
                foreach(array(1200,500,300) as $width) {
                    /*try {
                      $imo->resize($width, 2000, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $thumb_path = $destinationPath . '/'. $width.'_'.$new_filename ;
                    $imo->save($thumb_path, 85);
                    $imarray[$width] = array('path'=>$thumb_path,'width'=>$width,'height'=>$imo->height());  
                    } catch (Exception $e) {
                        
                    }
                    */
                    $image->generateResize($width);
                }
                //$image->image_cache_json = json_encode($imarray);

               
                $file_json['image'] = array('id'=>$image->id,'width'=>$image->original_width,'height'=>$image->original_height,'thumbnail'=>$image->generateResize(300));
            }

             $response['files'][] = $file_json;


          }
        }
        if($uploadcount == $file_count){
          //$request->session()->flash('success', 'Upload successfully'); 
          //return redirect(action('AdminController@files'));
            $response['status'] = 'success';

        return response()->json($response);
        } 
        else {

             return response()->json(['upload_status'=>'fail','upload_errors'=>$validator->messages()],200);
          //return redirect(action('AdminController@files'))->withInput()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = File::findOrFail($id);
        unlink($file->path);
        $file->delete();
        return redirect(action('FileController@index'));
    }

    /**
     * Retrieve image search JSON
     * @return \Illuminate\Http\Response
     */
    public function imageJson() 
    {
        $results = Image::get();
        $response = array('status'=>'success','count'=>$results->count(),'start'=>0,'results'=>$results);
        return response()->json($response);


    }
}
