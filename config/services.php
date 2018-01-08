<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
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
    'google' => [
        'client_id' => '1031741774377-uon9vl35j5d8ct6o0puuo4b52hofd2er.apps.googleusercontent.com',
        'client_secret' => 'FMYit6eQ-AYAWNxzZ7LRz3SJ',
        'redirect' => 'http://localhost:8000/handleProviderCallback',
    ],

    'facebook' => [
        'client_id' => '891006804401694',
        'client_secret' => '941e8f3c67e282a0ec6f4453f5637411',
        'redirect' => 'http://localhost:8000/callback/',
    ],

];
