<?php

namespace App;
use Auth;

use Laravel\Socialite\Contracts\User as ProviderUser;

class UserCreationService
{
    public function createUser(string $email,string $password,bool $is_admin,string $name='')
    {
        $user = new User;
        $user->email = $email;
        $user->name = $name;
        $user->password = encrypt($password);
        $user->long_id = md5($email);
        
        $user->admin = $is_admin;
        $user->save();
        return $user;
    }
}