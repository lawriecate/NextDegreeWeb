<?php

namespace App;
use Auth;

use Laravel\Socialite\Contracts\User as ProviderUser;
use Vinkla\Hashids\Facades\Hashids;
class UserCreationService
{
    public function createUser(string $email,string $password,bool $is_admin,string $name='')
    {
        $user = new User;
        $user->email = $email;
        $user->name = $name;
        $user->password = encrypt($password);
       
        
        $user->admin = $is_admin;
        $user->save();

         $user->long_id = Hashids::encode($user->id);
         $user->save();
        return $user;
    }


}