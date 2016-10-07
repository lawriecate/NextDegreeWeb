<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '163964194055948',
        'client_secret' => '44218e01b94b30583acfe9d886e073ea',
        'redirect' => 'http://localhost:8888/nd/NextDegreeWeb/public/settings/facebook/callback',
    ],

     'linkedin' => [
        'client_id' => '7797po61yyxddc',
        'client_secret' => 'fCzx8grP07sUE61z',
        'redirect' => 'http://localhost:8888/nd/NextDegreeWeb/public/settings/linkedin/callback',
    ],

];
