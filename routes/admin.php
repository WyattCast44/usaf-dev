<?php

Route::get('/dashboard', 'AdminDashboardController')->name('admin.dashboard');
Route::get('/dashboard/apps', 'Admin\AppsController@index')->name('admin.apps.index');
Route::post('/dashboard/apps', 'Admin\AppsController@store')->name('admin.apps.store');
Route::get('/dashboard/apps/create', 'Admin\AppsController@create')->name('admin.apps.create');
Route::get('/dashboard/users', 'Admin\UsersController@index')->name('admin.users.index');
