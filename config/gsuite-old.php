<?php

return [

    /*
    |--------------------------------------------------------------------------
    | User to impersonate
    |--------------------------------------------------------------------------
    | The email of the user to impersonate, user should have neccessary
    | permissions for the scopes requested
    */
    'subject' => env('GOOGLE_SERVICE_ACCOUNT_USER'),

    /*
    |--------------------------------------------------------------------------
    | Path to Credentials
    |--------------------------------------------------------------------------
    | This should be the full path to the credentials file supplied
    | by google when creating a service account
    */
    'credentials_path' => storage_path('credentials.json'),

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    | The scopes requested
    | @link https://developers.google.com/admin-sdk/directory/v1/reference/
    | @link https://admin.google.com/usaf.cloud/AdminHome?chromeless=1#OGX:ManageOauthClients
    */
    'scopes' => [
        'https://www.googleapis.com/auth/admin.directory.user',
        'https://www.googleapis.com/auth/admin.directory.group'
    ],

    /*
    |--------------------------------------------------------------------------
    | Domain
    |--------------------------------------------------------------------------
    | Your domain
    | @link https://developers.google.com/admin-sdk/directory/v1/reference/
    */
    'domain' => 'usaf.cloud',

    /*
    |--------------------------------------------------------------------------
    | Cost Per User Per Month
    |--------------------------------------------------------------------------
    | Your domain
    | @link https://developers.google.com/admin-sdk/directory/v1/reference/
    */
    'monthly_cost_per_user' => 12.00,

    /*
    |--------------------------------------------------------------------------
    | Groups cache name
    |--------------------------------------------------------------------------
    | Name to cache the gsuite groups under
    | @link https://developers.google.com/admin-sdk/directory/v1/reference/
    */
    'group-cache' => 'gsuite:groups',

    /*
    |--------------------------------------------------------------------------
    | Accounts cache name
    |--------------------------------------------------------------------------
    | Name to cache the gsuite accounts under
    | @link https://developers.google.com/admin-sdk/directory/v1/reference/
    */
    'accounts-cache' => 'gsuite:accounts',
    
];
