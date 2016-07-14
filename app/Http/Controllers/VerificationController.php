<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Mail;
use Random;


class VerificationController extends Controller
{
	use CanSendVerificationEmail;
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function status(Request $request, $token = null) {
    	if($request->token != "") {
    		if($this->verifyAccount($token)) {
    			// account verified
    		} else {
    			$request->session()->flash('invalid_attempt', true);
    		}
    	}
    	return view('ndauth.verification');
    }

    public function request_resend(Request $request) {
    	$this->resendEmail();
    	$request->session()->flash('resent', true);
    	return redirect()->action('VerificationController@status');
    }

    private function verifyAccount($token) {
    	$user = Auth::user();
    	if($token == $user->verification_token) {
    		$user->verified = true;
    		$user->verification_token = null;
    		$user->save();
    		return true;
    	} 
    	return false;
    }

    public function resendEmail() {
    	$this->sendVerificationEmail();
    }
}
