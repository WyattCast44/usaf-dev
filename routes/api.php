<?php

Route::middleware('auth:api')->group(function () {
    /**
     * Users
     */
    Route::get('/user', 'API\UsersController@show');
    Route::get('/users', 'API\UsersController@index');

    /**
     * User Email
     */
    Route::get('/user/email', 'API\UserEmailsController@show');
    Route::post('/user/email', 'API\UserEmailsController@update');
});
