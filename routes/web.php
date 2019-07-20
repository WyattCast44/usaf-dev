<?php

Route::view('/', 'welcome');

Auth::routes(['register' => config('setting.open-registration'), 'verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard...
    Route::get('/dashboard', 'DashboardController')->name('user.dashboard');
    
    // Apps
    Route::get('/dashboard/apps', 'UserAppsController@index')->name('user.apps.index');
});
