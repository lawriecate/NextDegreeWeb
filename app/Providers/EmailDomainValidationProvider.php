<?php

namespace App\Providers;
use Validator;
use Illuminate\Support\ServiceProvider;
use App\Institution;

class EmailDomainValidationProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
         Validator::extend('studentdomain', function($attribute, $value, $parameters, $validator) {
            if(!filter_var($value, FILTER_VALIDATE_EMAIL)) 
            { 
                return false; 
            }

            $domain = substr(strrchr($value, "@"), 1);

            return Institution::where('domain',$domain)->where('enable_registration',true)->count() == 1;

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
