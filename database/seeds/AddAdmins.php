<?php

use Illuminate\Database\Seeder;
use App\User;

class AddAdmins extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $email = 'lcate@nextdegree.co.uk';
            $password = 'password2034';
            $user = new User;
                $user->email = $email;
                $user->name = 'Lawrie Cate';
                $user->password = encrypt($password);
                $user->admin = true;
            $user->save();
        $email = 'mvine@nextdegree.co.uk';
            $password = 'password2034';
            $user = new User;
                $user->email = $email;
                $user->name = 'Matthew Vine';
                $user->password = encrypt($password);
                $user->admin = true;
            $user->save();
    }
}
