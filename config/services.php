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
        'client_id' => '816117374666-07krue3t9ehv5sosoh5jf9rhk6dq0h9j.apps.googleusercontent.com',
        'client_secret' => '5uQYikuLquB4UMp6JpyheY5M',
        'redirect' => env('APP_URL').'/authorized/google/callback',
    ],
    'twitter' => [
        'client_id' => "169792211493899",
        'client_secret' => "65f23ff8323aafd2e2de37add3e74988",
        'redirect' => env('APP_URL').'/authorized/twitter/callback',
      ],

];
