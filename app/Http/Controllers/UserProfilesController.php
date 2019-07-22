<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function __invoke()
    {
        return view('dashboard.profile.edit');
    }
}
