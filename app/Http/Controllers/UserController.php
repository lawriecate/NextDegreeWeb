<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserPostRequest;
use App\User;
use App\UserCreationService;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_user')->with('user',new User)->with('submit_to',action('UserController@store'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,UserCreationService $userCreationService)
    {
        $user = $userCreationService->createUser($request->email,$request->password,$request->admin=="true",$request->name);
        return redirect(action('UserController@edit',$user->id));

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
    public function edit($user)
    {
      //  $user = User::findOrFail($id);
        return view('admin.edit_user')->with('user',$user)->with('submit_to',action('UserController@update',$user))->with('method','PUT');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
      //  $user = User::findOrFail($id);
        $user->email = $request->email;
        if($request->new_password != "" ){
            $user->password = bcrypt($request->new_password);
        }
        if($request->admin == "true") {
            $user->admin = true;
        } else {
            $user->admin = false;
        }
        $user->save();
        return redirect(action('UserController@edit',$user->id));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$user)
    {

        if($request->confirm != "true" || $user->admin == true) {
            die();
        }
        $user->delete();
 return redirect(action('UserController@index',$user->id));
    }
}
