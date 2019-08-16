<?php

Route::middleware(['auth', 'verified', 'admin'])->group(function () {

    // Index...
    Route::get('/dashboard', 'Admin\DashboardController')->name('admin.dashboard');

    // Apps...
    Route::get('/dashboard/apps', 'Admin\AppsController@index')->name('admin.apps.index');
    Route::post('/dashboard/apps', 'Admin\AppsController@store')->name('admin.apps.store');
    Route::get('/dashboard/apps/create', 'Admin\AppsController@create')->name('admin.apps.create');
    Route::get('/dashboard/apps/{app}', 'Admin\AppsController@show')->name('admin.apps.show');

    // Users...
    Route::get('/dashboard/users', 'Admin\UsersController@index')->name('admin.users.index');
    Route::post('/dashboard/users', 'Admin\UsersController@store')->name('admin.users.store');
    Route::get('/dashboard/users/create', 'Admin\UsersController@create')->name('admin.users.create');
    Route::get('/dashboard/users/{user}', 'Admin\UsersController@show')->name('admin.users.show');

    // G-Suite
    Route::get('/dashboard/gsuite', 'Admin\GSuiteController@index')->name('admin.gsuite.index');

    // G-Suite Accounts
    Route::get('/dashboard/gsuite/accounts', 'Admin\GSuiteAccountsController@index')->name('admin.gsuite.accounts.index');
    Route::post('/dashboard/gsuite/accounts', 'Admin\GSuiteAccountsController@store')->name('admin.gsuite.accounts.store');
    Route::get('/dashboard/gsuite/accounts/create', 'Admin\GSuiteAccountsController@create')->name('admin.gsuite.accounts.create');
    Route::post('/dashboard/gsuite/accounts/delete', 'Admin\GSuiteAccountsController@delete')->name('admin.gsuite.accounts.delete');
    Route::get('/dashboard/gsuite/accounts/show/{email}', 'Admin\GSuiteAccountsController@show')->name('admin.gsuite.accounts.show');
    Route::get('/dashboard/gsuite/accounts/refresh', 'Admin\GSuiteAccountsController@refresh')->name('admin.gsuite.accounts.refresh');

    // G-Suite Groups
    Route::get('/dashboard/gsuite/groups', 'Admin\GSuiteGroupsController@index')->name('admin.gsuite.groups.index');
    Route::post('/dashboard/gsuite/groups', 'Admin\GSuiteGroupsController@store')->name('admin.gsuite.groups.store');
    Route::get('/dashboard/gsuite/groups/create', 'Admin\GSuiteGroupsController@create')->name('admin.gsuite.groups.create');
    Route::get('/dashboard/gsuite/groups/show/{email}', 'Admin\GSuiteGroupsController@show')->name('admin.gsuite.groups.show');
    Route::get('/dashboard/gsuite/groups/refresh', 'Admin\GSuiteGroupsController@refresh')->name('admin.gsuite.groups.refresh');

    // G-Suite Settings
    Route::get('/dashboard/gsuite/settings', 'Admin\GSuiteSettingsController@index')->name('admin.gsuite.settings.index');

    // Security
    Route::get('/dashboard/security', 'Admin\SecurityController@index')->name('admin.security.index');
});
