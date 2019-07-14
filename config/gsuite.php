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
    */
    'scopes' => [
        'https://www.googleapis.com/auth/admin.directory.user',
        'https://www.googleapis.com/auth/admin.directory.group',
    ],
        
];
