<?php

Auth::routes(['register' => config('setting.open-registration'), 'verify' => true]);

Route::view('/', 'welcome');

Route::get('/auth/cac', function () {
    if ($_SERVER['SSL_CLIENT_VERIFY'] === "NONE") {
        dd('error');
    }
    
    dd($_SERVER);
});
