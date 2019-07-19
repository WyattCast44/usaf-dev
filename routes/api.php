<?php

Route::middleware('auth:api')->group(function () {
    /**
     * Users
     */
    Route::get('/user', 'API\UsersController@show');

    /**
     * User Email
     */
    Route::get('/user/email', 'API\UserEmailsController@show');
});
