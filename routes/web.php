<?php

Auth::routes(['register' => config('setting.open-registration'), 'verify' => true]);

Route::view('/', 'welcome');
