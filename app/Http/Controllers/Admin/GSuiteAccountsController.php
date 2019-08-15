<?php

namespace App\Http\Controllers\Admin;

use Wyattcast44\GSuite\GSuite;
use App\Http\Controllers\Controller;

class GSuiteAccountsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
    }
    
    public function index(GSuite $gsuite)
    {
        $accounts = $gsuite->accounts()->list();

        return view('admin.gsuite.users.index', ['accounts' => $accounts]);
    }

    public function create()
    {
        return view('admin.gsuite.users.create');
    }
}
