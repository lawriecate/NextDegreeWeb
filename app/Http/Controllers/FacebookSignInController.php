<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use Socialite;
use App\SocialAccountService;


class FacebookSignInController extends Controller
{
    public function redirectToFacebook() 
   {
    	$redirectUrl = action('FacebookSignInController@facebookLoginCallback');
    	
    	return Socialite::driver('facebook')->redirectUrl($redirectUrl)->redirect();
    }

    public function facebookLoginCallback(SocialAccountService $service,Request $request) 
    {
    	if(Auth::check()) {
    		return redirect(action('SettingsController@facebookCallback'));
    	}

    	try {
          	$fb_user = Socialite::driver('facebook')->user();
        	$service->authenticateWith('facebook',$fb_user);
        	return redirect()->action('HomeController@index'); 
       	} catch (\Exception $e) {
            $request->session()->flash('social_connect_error',true);
            return redirect()->action('HomeController@index'); 
        }
    	
    }
}
