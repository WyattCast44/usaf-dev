<?php

Auth::routes(['register' => config('setting.open-registration'), 'verify' => true]);

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', 'DashboardController')->name('users.dashboard');
});
