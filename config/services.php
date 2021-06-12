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
        'client_id' => '292225187513-nmdh5ucuulcthnqee9jrnq0649kr3tk3.apps.googleusercontent.com',
        'client_secret' => 'CDvWjrbrEiBgtFQIJqshWUK6',
        'redirect' => 'http://localhost:8888/cuahangntn.com/admin/callback-gg',
    ],

    'facebook' => [
        'client_id' => '208251227064009',  //client face của bạn
        'client_secret' => 'http://localhost:8888/cuahangntn.com/',  //client app service face của bạn
        'redirect' => 'http://localhost::8888/cuahangntn.com/admin/callback', //callback trả về
    ],



];
