<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;


class SettingsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

	public function accountForm() {
		$user = Auth::user();
		return view('settings.accountform');
	}
    public function update(Request $request) {
    	$user = Auth::user();

    	$this->validate($request, [
	        'email' => 'required|email|studentdomain|unique:users,email,'.$user->id,
            'password' => 'present|confirmed|min:6',
	    ]);
    	
    	$user->email = $request->email;
    	if($request->password != "") {
    		$user->password = bcrypt($request->password);
    	}
    	$user->save();
    	$request->session()->flash('saved', true);
    	return redirect()->action('SettingsController@accountForm');
    }

}
