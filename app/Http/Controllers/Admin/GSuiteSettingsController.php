<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class GSuiteSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
    }
    
    public function index()
    {
        return view('admin.gsuite.settings.index');
    }
}
