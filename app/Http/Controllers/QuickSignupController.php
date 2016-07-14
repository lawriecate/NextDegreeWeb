<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Http\Requests;
use App\User;
use App\Student;
use App\Institution;
use Random;
use Auth;
class QuickSignupController extends Controller
{
    use CanSendVerificationEmail;
    public function makeUser(Request $request) {
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255|unique:users|studentdomain'
        ]);

        if ($validator->fails()) {
            return redirect(action('QuickSignupController@error'))
                        ->withErrors($validator)
                        ->withInput();
        }
    	$email = $request->email;
    	$password = Random::generateString(12, 'abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ23456789!@#$%&*?');
    	$user = User::create([
            'email' => $email,
            'password' => bcrypt($password),
        ]);

    	// create student profile
        $domain = substr(strrchr($email, "@"), 1);
        $profile = new Student;
        $profile->user_id=$user->id;
        $profile->institution_id=Institution::where('domain',$domain)->first()->id;
        $profile->save();
        // login user
    	Auth::login($user);

        // send verification email, must happen AFTER login so can send to current user
        $this->sendVerificationEmail();
      
    	return view('ndauth.signup',['email'=>$email,'password'=>$password]);
    }

    public function continue() {
    	return redirect('home');
    }

    public function error(Request $request) {
    	return view('ndauth.error');
    }
}
