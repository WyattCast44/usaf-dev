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

// GSuite Accounts
Route::get('/dashboard/gsuite/accounts', 'Admin\GSuiteAccountsController@index')->name('admin.gsuite.accounts.index');
Route::post('/dashboard/gsuite/accounts', 'Admin\GSuiteAccountsController@store')->name('admin.gsuite.accounts.store');
Route::get('/dashboard/gsuite/accounts/create', 'Admin\GSuiteAccountsController@create')->name('admin.gsuite.accounts.create');

// GSuite Groups
Route::get('/dashboard/gsuite/groups', 'Admin\GSuiteGroupsController@index')->name('admin.gsuite.groups.index');
Route::post('/dashboard/gsuite/groups', 'Admin\GSuiteGroupsController@store')->name('admin.gsuite.groups.store');
Route::get('/dashboard/gsuite/groups/create', 'Admin\GSuiteGroupsController@create')->name('admin.gsuite.groups.create');

// Security
Route::get('/dashboard/security', 'Admin\SecurityController@index')->name('admin.security.index');
