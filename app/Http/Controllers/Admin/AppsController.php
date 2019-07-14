<?php

namespace App\Http\Controllers\Admin;

use App\Models\Passport\Client;
use App\Http\Controllers\Controller;

class AppsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
    }
    
    public function index()
    {
        return view('admin.apps.index', ['clients' => Client::all()]);
    }

    public function create()
    {
        return view('admin.apps.create');
    }
}
