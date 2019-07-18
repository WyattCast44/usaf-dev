<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\GSuite\GSuiteGroupRepository;
use App\Services\GSuite\GSuiteAccountsRepository;

class GSuiteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
    }
    
    public function index(GSuiteAccountsRepository $accounts_repo, GSuiteGroupRepository $groups_repo)
    {
        $stats = [
            'accounts_number' => $accounts_repo->fetch()->count(),
            'groups_number' => $groups_repo->fetch()->count(),
            'monthly_cost' => config('gsuite.monthly_cost_per_user') * $accounts_repo->fetch()->count(),
        ];

        return view('admin.gsuite.index', $stats);
    }
}
