<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\GSuite\GSuiteAccountsRepository;

class GSuiteAccountsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
    }
    
    public function index(GSuiteAccountsRepository $users_repo)
    {
        $accounts = $users_repo->fetch();

        return view('admin.gsuite.users.index', ['accounts' => $accounts]);
    }
}
