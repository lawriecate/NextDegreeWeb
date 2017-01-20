<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Random;
use Auth;
use App\UserCreationService;
use Illuminate\Support\Facades\Storage;

class SetupAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setupadmin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add an admin user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if(User::all()->isEmpty()) {
            $email = 'lcate@nextdegree.co.uk';
            $password = 'password';
            $user = new User;
                $user->email = $email;
                $user->password = encrypt($password);
                $user->admin = true;
            $user->save();
            //Auth::login($user);
            return 'done';
        }
        else 
        {
            return 'error';
        }
    }
}
