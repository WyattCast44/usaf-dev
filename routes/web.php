<?php

Route::get('/', 'HomePageController');

Auth::routes(['register' => config('setting.open-registration'), 'verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard...
    Route::get('/dashboard', 'DashboardController')->name('user.dashboard');
    
    // Apps
    Route::get('/dashboard/apps', 'UserAppsController@index')->name('user.apps.index');
    
    // Profile
    Route::get('/dashboard/profile', 'UserProfilesController')->name('user.profile.index');

    // Avatar Update
    Route::post('/dashboard/profile/avatar', 'UserAvatarsController@store')->name('user.avatar.update');

    // Password Reset
    Route::patch('/dashboard/profile/password/reset', 'UserPasswordResetController@update')->name('user.password.update');
});
