<?php

namespace App;
use Auth;

use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
    public function setSocialConnection(String $provider,ProviderUser $providerUser,User $user)
    {
        $account = SocialAccount::whereProvider($provider)
            ->whereUserId($user->id)
            ->first();

        if ($account) {
            return true;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $provider,
                'user_id'=>$user->id
            ]);

            //$user = Auth::user();
            /*$user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {
                // DO NOT REGISTER NEW USERS ON FACEBOOK LOGIN
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                ]);
                return false;
            }*/

            $account->user()->associate($user);
            $account->save();

            return true;

        }

    }

    public function authenticateWith(String $provider,ProviderUser $providerUser)
    {

         $account = SocialAccount::whereProvider($provider)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            Auth::loginUsingId($account->user_id, true);
            return true;
        } 
        return false;
    }
}