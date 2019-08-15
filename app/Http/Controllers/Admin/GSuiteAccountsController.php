<?php

namespace App\Http\Controllers\Admin;

use Wyattcast44\GSuite\GSuite;
use App\Http\Controllers\Controller;
use App\Rules\ValidGSuiteGroupEmail;
use Illuminate\Http\Request;

class GSuiteAccountsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
    }
    
    public function index(GSuite $gsuite)
    {
        $accounts = $gsuite->accounts()->list();

        return view('admin.gsuite.accounts.index', ['accounts' => $accounts]);
    }

    public function create()
    {
        return view('admin.gsuite.accounts.create');
    }

    public function store(Request $request, GSuite $gsuite)
    {
        $this->validate($request, [
            'first_name' => ['required', 'string', 'max:60'],
            'last_name' => ['required', 'string', 'max:60'],
            'email' => ['required', 'email', new ValidGSuiteGroupEmail],
        ]);

        $group = $gsuite->accounts()->insert();
        
        return redirect()->route('admin.gsuite.groups.show', $group->email);
    }

    public function refresh(GSuite $gsuite)
    {
        $gsuite->accounts()->flushCache();
        
        return redirect()->route('admin.gsuite.accounts.index');
    }
}
