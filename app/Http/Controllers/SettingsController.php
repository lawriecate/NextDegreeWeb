<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Socialite;
use App\SocialAccountService;
use App\ProfileImageService;

class SettingsController extends Controller
{
	public function __construct()
    {

       // $this->middleware('auth');
    }

	public function accountForm() {
		$user = Auth::user();
		return view('settings.accountform');
	}
    public function update(Request $request) {
    	$user = Auth::user();

        $append= '';

        if(is_null($user->business)) {
            $append = '|studentdomain';
        }
    	$this->validate($request, [
	        'email' => 'required|email|unique:users,email,'.$user->id.$append,
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

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallback(SocialAccountService $service,Request $request)
    {
        try {
            $fb_user = Socialite::driver('facebook')->user();
            if(Auth::guest()) {
                // login request
                try {
                    $service->authenticateWith('facebook',$fb_user);
                    return redirect()->action('HomeController@index'); 
                } catch (\Exception $e) {
                    $request->session()->flash('social_login_error',true);
                    return redirect()->action('Auth\AuthController@showLoginForm'); 
                }
            }
            else {
                // association request
                $service->setSocialConnection('facebook',$fb_user,Auth::user());

                // All Providers
                /*var_dump($fb_user->getId());
                
                var_dump($fb_user->getName());
                var_dump($fb_user->getEmail());
                var_dump($fb_user->getAvatar());*/
                $request->session()->flash('social_name', $fb_user->getName());
                $request->session()->flash('social_avatar', $fb_user->getAvatar());
                return redirect()->action('SettingsController@promptCopyProfile',['network'=>'facebook']); 
            }
            
        } catch (\Exception $e) {
            echo $e;
            exit(0);
            $request->session()->flash('social_connect_error',true);
            return redirect()->action('SettingsController@accountForm');
        }
        
    }

    public function redirectToLinkedIn()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    public function linkedInCallback(SocialAccountService $service,Request $request)
    {
        try {
            $li_user = Socialite::driver('linkedin')->user();
            $service->setSocialConnection('linkedin',$li_user,Auth::user());

            // All Providers
            /*var_dump($fb_user->getId());
            
            var_dump($fb_user->getName());
            var_dump($fb_user->getEmail());
            var_dump($fb_user->getAvatar());*/
            $request->session()->flash('social_name', $li_user->getName());
            $request->session()->flash('social_avatar', $li_user->getAvatar());
            return redirect()->action('SettingsController@promptCopyProfile',['network'=>'linkedin']);
        } catch (\Exception $e) {
            $request->session()->flash('social_connect_error',true);
            return redirect()->action('SettingsController@accountForm');
        }
        
    }

    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function twitterCallback(SocialAccountService $service,Request $request)
    {
        try {
            $li_user = Socialite::driver('twitter')->user();
            $service->setSocialConnection('twitter',$li_user,Auth::user());

            // All Providers
            /*var_dump($fb_user->getId());
            
            var_dump($fb_user->getName());
            var_dump($fb_user->getEmail());
            var_dump($fb_user->getAvatar());*/
            /*$request->session()->flash('social_name', $li_user->getName());
            $request->session()->flash('social_avatar', $li_user->getAvatar());
            return redirect()->action('SettingsController@promptCopyProfile',['network'=>'twitter']);*/
            return redirect()->action('SettingsController@accountForm');
        } catch (\Exception $e) {
            $request->session()->flash('social_connect_error',true);
            return redirect()->action('SettingsController@accountForm');
        }
        
    }

    public function promptCopyProfile($network,Request $request)
    {
        if(!\Session::has('social_name')) {
            return redirect()->action('SettingsController@accountForm');
        }
        $request->session()->reflash();
        $network_name = "Facebook";
        if($network=='linkedin') { $network_name = 'LinkedIn';}
        return view('settings.copyprofile')->with('network',$network_name);
    }

    public function copyProfile(Request $request,ProfileImageService $profileImageService) 
    {
        if(!\Session::has('social_name')) {
            return redirect()->action('SettingsController@accountForm');
        }
        $user = Auth::user();
        $user->name = session('social_name');
        $user->save();

        $tmp_image = tempnam(sys_get_temp_dir(), 'profile_images');
        file_put_contents($tmp_image, file_get_contents(session('social_avatar')));

        $profileImageService->saveNewProfileImage($tmp_image);

        return redirect()->action('SettingsController@accountForm');
    }

}
