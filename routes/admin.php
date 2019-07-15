<?php

Route::get('/dashboard', 'Admin\DashboardController')->name('admin.dashboard');

// Apps...
Route::get('/dashboard/apps', 'Admin\AppsController@index')->name('admin.apps.index');
Route::post('/dashboard/apps', 'Admin\AppsController@store')->name('admin.apps.store');
Route::get('/dashboard/apps/create', 'Admin\AppsController@create')->name('admin.apps.create');

// Users...
Route::get('/dashboard/users', 'Admin\UsersController@index')->name('admin.users.index');

// GSuite
Route::get('/dashboard/gsuite', 'Admin\GSuiteController@index')->name('admin.gsuite.index');
