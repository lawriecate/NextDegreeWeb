<?php

namespace App\Providers;
use App\User;
use Illuminate\Support\ServiceProvider;

class UserAccountServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
         User::deleting(function ($user) {
   
        $user->skills()->delete();
        $user->job_types()->delete();
        $user->social_accounts()->delete();
        if($user->student != null) { 
               $user->student->delete();
        }
     
        if($user->business != null) { 
            $user->business->delete();
        }

         if($user->profile_image_id != null) {
            $user->profile_image->delete();
         }

        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
