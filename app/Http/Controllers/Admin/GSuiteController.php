<?php

namespace App\Http\Controllers\Admin;

use Wyattcast44\GSuite\GSuite;
use App\Http\Controllers\Controller;

class GSuiteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
    }

    public function index(GSuite $gsuite)
    {
        $stats = [
            'accounts_number' => collect($gsuite->accounts()->list())->count(),
            'groups_number' => collect($gsuite->groups()->list())->count(),
            'monthly_cost' => config('gsuite.monthly_cost_per_user') * collect($gsuite->accounts()->list())->count(),
        ];

        return view('admin.gsuite.index', $stats);
    }
}
