<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '980522471953-kvm2sno4l68brtvs0o6sgtafi87jttdl.apps.googleusercontent.com',
        'client_secret' => 'odB1chhEzMmScniWnkguS8eq',
        'redirect' => 'http://localhost/tutorial/public/login/google/callback',
    ],


    'facebook' => [
        'client_id' => '672727326679483',
        'client_secret' => '53193a569ad2d12e257397968e36abb3',
        'redirect' => 'http://localhost/tutorial/public/login/facebook/callback',
    ],

];
