<?php

Route::get('/dashboard', 'AdminDashboardController')->name('admin.dashboard');
Route::get('/dashboard/users', 'Admin\UsersController@index')->name('admin.users.index');
