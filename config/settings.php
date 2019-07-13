<?php

return [

    /*
    |
    | Flag for whether or not user
    | registations are open
    |
    */
    'open-registration' => env('OPEN_REGISTRATION', false),

    /*
    |
    | Allow Password Resets
    | Should users be able to reset thier own password
    |
     */
    'allow-password-resets' => env('ALLOW_PASSWORD_RESETS', true),

    /*
    |
    | Min password length
    |
    */
    'min-password-length' => 8,

    /*
    |
    | Passport Client Types
    |
    */
    'passport_client_types' => [
        
        'first-party' => [
            'name' => 'First Party',
            'description' => 'First party applications, that have full access.',
            'scopes' => [
                '*'
            ]
        ],

    ],
];
