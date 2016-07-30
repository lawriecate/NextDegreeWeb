<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StorePostRequest;
use App\Post;

class PostController extends Controller
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
        return view('admin.posts');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.edit_post')->with('submit_to',action('PostController@store'))->with('post',new Post);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->html = $request->html;
        $post->description = $request->description;
        $post->display_image = $request->display_image;
        if($request->display_image=="") { $post->display_image =null;}

        $status = $request->status;
        if($status == "publish") {
            $publish_time =  date( 'Y-m-d H:i:s', strtotime($request->publish_date . ' ' . $request->publish_time) );
            $post->publish_at = $publish_time;
        }
        elseif ($status=="publish_now") {
            $post->publish_at = date( 'Y-m-d H:i:s');
        } 
        else {
            $post->publish_at = null;
        }

        $post->save();
        return redirect(action('PostController@index'));
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
    public function edit($post)
    {

        return view('admin.edit_post')->with('post',$post)->with('submit_to',action('PostController@update',$post))->with('method','PUT');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, $post)
    {

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->html = $request->html;
        $post->description = $request->description;
        $post->display_image = $request->display_image;
        if($request->display_image=="") { $post->display_image =null;}
 
        $status = $request->status;
        if($status == "publish") {
            $publish_time =  date( 'Y-m-d H:i:s', strtotime($request->publish_date . ' ' . $request->publish_time) );
            $post->publish_at = $publish_time;
        }
        elseif ($status=="publish_now") {
            $post->publish_at = date( 'Y-m-d H:i:s');
        } 
        else {
            $post->publish_at = null;
        }
        
        $post->save();
        return redirect(action('PostController@edit',$post->slug));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {
        $post->delete();
        return redirect(action('PostController@index'));
    }

    public function checkSlug(Request $request) 
    {
        if(Post::where('slug',$request->slug)->count() > 0) {
            return response()->json(false); 
        }
        return response()->json(true);
    }
}
