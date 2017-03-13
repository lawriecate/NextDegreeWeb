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

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['makeUser','redirectToFacebook','setupAdmin','error','redirect','facebookEmailPrompt','createByFacebook','facebookEmailPromptSave','signUpUser']]);
    }

    public function makeUser($type,$email) {
         $userCreationService = new UserCreationService();
        if($type == "business") 
        {
            $validator = Validator::make(['email'=>$email], [
                'email' => 'required|email|max:255|unique:users'
            ]);

            if ($validator->fails()) {
                return redirect(action('QuickSignupController@error'))
                            ->withErrors($validator)
                            ->withInput();
            }
   
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
        else if($type == "student") 
        {
            $validator = Validator::make(['email'=>$email], [
                'email' => 'required|email|max:255|unique:users|studentdomain'
            ]);

            if ($validator->fails()) {
                return redirect(action('QuickSignupController@error'))
                            ->withErrors($validator)
                            ->withInput();
            }

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

            if($request->session()->get('fbcallbackaction') == 'register') {
                // just connect to facebook, user already connected
                $request->session()->put('fbcallbackaction', 'assoc_then_copy');
                return redirect(action('SettingsController@redirectToFacebook'));
            }
          
            return view('ndauth.signup',['email'=>$email,'password'=>$password]);
        }
        else 
        {
            return abort(401, 'Unauthorized action.');
        }
    }
    public function signUpUser(Request $request) {
        return $this->makeUser($request->type,$request->email);
    }

    public function redirect(Request $request) {
        if($request->session()->get('postAuthRedirect') != '') {
            return redirect($request->session()->get('postAuthRedirect'));
        }
    	return redirect('home');
    }

    public function redirectToFacebook() {
        return redirect(action('SettingsController@redirectToFacebook'));
    }

    public function error(Request $request) {
        $request->session()->flush();
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

    public function namePrompt() {
        return view('ndauth.nameprompt');
    }

    public function saveName(Request $request) {
        $valid = false;
        $name = $request->name;
        if($name!="") {
            $valid = true;
        }

        if($valid) {
            $user = Auth::user();
            $user->name = $name;
            $user->save();
            return $this->redirect($request);
        }
        return view('ndauth.nameprompt');
    }

    public function facebookEmailPrompt() {
        return view('ndauth.signup_fromfb');
    }

    public function facebookEmailPromptSave(Request $request) {
        // save email to session/cookie and set registration flag
        $request->session()->put('fbpromptemail' ,$request->email);
        $request->session()->put('fbcallbackaction' ,'register');
        //dd($request->session()->all());
        //die();
        // go back to facebook 
        return redirect(action('SettingsController@redirectToFacebook'));
    }

    public function createByFacebook(Request $request) {
        $email = $request->session()->get('fbpromptemail');
        return $this->makeUser('student',$email);
        
        //return 'Signing you up now!';
        //return $this->makeUser($request->all()->put('email',$email)->put('type','student'));
    }
}
