<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
class BusinessHomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('business.home');
    }

    public function search(Request $request)
    {
    	$results= User::all()->take(5);
    	if($request->ajax()){
            return response()->json(array('status'=>'success','data'=>$results));
        }
        return redirect(action('HomeController@index'));
    }

}
