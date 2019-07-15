<?php

use App\Services\GSuite\GSuite;
use App\Services\GSuite\GSuiteUserRepository;

Route::view('/', 'welcome');

Auth::routes(['register' => config('setting.open-registration'), 'verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', 'DashboardController')->name('user.dashboard');
});

Route::get('/data/users', 'DataTables\UsersController@index')->name('datatables.users');

Route::get('/test', function (GSuiteUserRepository $users) {
    dd($users->fetchAll());
});
