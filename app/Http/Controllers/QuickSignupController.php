<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Http\Requests;
use App\User;
use App\Student;
use App\Business;
use App\Institution;
use Random;
use Auth;
use App\UserCreationService;
class QuickSignupController extends Controller
{
    use CanSendVerificationEmail;
    public function makeUser(Request $request,UserCreationService $userCreationService) {
        if($request->type == "business") 
        {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|max:255|unique:users'
            ]);

            if ($validator->fails()) {
                return redirect(action('QuickSignupController@error'))
                            ->withErrors($validator)
                            ->withInput();
            }
            $email = $request->email;
            $password = Random::generateString(12, 'abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ23456789!@#$%&*?');
            $user = $userCreationService->createUser($email,$password,false);
            // create business profile
           
            $profile = new Business;
            $profile->user_id=$user->id;
            $profile->save();
            // login user
            Auth::login($user);

            // send verification email, must happen AFTER login so can send to current user
            $this->sendWelcomeEmail('business');
          
            return view('ndauth.signup',['email'=>$email,'password'=>$password]);
        }
        else if($request->type == "student") 
        {
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
            $user = $userCreationService->createUser($email,$password,false);

            // create student profile
            $domain = substr(strrchr($email, "@"), 1);
            $profile = new Student;
            $profile->user_id=$user->id;
            $profile->institution_id=Institution::where('domain',$domain)->first()->id;
            $profile->save();
            // login user
            Auth::login($user);

            // send verification email, must happen AFTER login so can send to current user
            $this->sendWelcomeEmail('student');
          
            return view('ndauth.signup',['email'=>$email,'password'=>$password]);
        }
        else 
        {
            return abort(401, 'Unauthorized action.');
        }
    	
    }

    public function redirect() {
    	return redirect('home');
    }

    public function redirectToFacebook() {
        return redirect(action('SettingsController@redirectToFacebook'));
    }

    public function error(Request $request) {
    	return view('ndauth.error');
    }

    public function setupAdmin() {
        if(User::all()->isEmpty()) {
            $email = 'lcate@nextdegree.co.uk';
            $password = 'password';
            $user = new User;
                $user->email = $email;
                $user->password = encrypt($password);
                $user->admin = true;
            $user->save();
            Auth::login($user);
            return redirect(action('AdminController@index'));
        }
        else 
        {
            return abort(404);
        }

    }
}
