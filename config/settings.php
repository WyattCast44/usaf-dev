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
];
