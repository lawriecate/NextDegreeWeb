<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use Random;

trait CanSendVerificationEmail
{
    private function sendVerificationEmail() {
    	$user = Auth::user();
    	$token = Random::generateString(40, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789$-_.+!*(),');
    	$user->verification_token = $token;
    	$user->save();

    	Mail::send('ndauth.email_verification', ['user' => $user, 'token'=>$token], function ($m) use ($user) {
            $m->from('system@nextdegree.co.uk', 'Next Degree');

            $m->to($user->email, $user->email)->subject('Verify Your Next Degree Account');
        });
    }
}
