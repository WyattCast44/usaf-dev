<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAppsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $apps = auth()->user()->apps;

        return view('dashboard.apps.index', ['apps' => $apps]);
    }
}
