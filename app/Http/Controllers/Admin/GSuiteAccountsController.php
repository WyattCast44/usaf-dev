<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Wyattcast44\GSuite\GSuite;
use App\Http\Controllers\Controller;
use App\Rules\ValidGSuiteGroupEmail;

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
        
        $name = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ];

        $password = Str::random(16);

        $gsuite->accounts()->insert($name, $request->email, $password);

        alert('Account created!', 'Your new account has been created, it may take a few minutes to appear.', 'success');
        
        return redirect()->route('admin.gsuite.accounts.index');
    }

    public function show(GSuite $gsuite, $email)
    {
        $account = $gsuite->accounts()->get($email);

        if ($account === null) {
            return abort(404);
        }

        return view('admin.gsuite.accounts.show', ['account' => $account]);
    }

    public function refresh(GSuite $gsuite)
    {
        $gsuite->accounts()->flushCache();
        
        return redirect()->route('admin.gsuite.accounts.index');
    }

    public function delete(Request $request, GSuite $gsuite)
    {
        $this->validate($request, [
            'email' => ['required', 'email', new ValidGSuiteGroupEmail]
        ]);

        $gsuite->accounts()->delete($request->email);

        alert('Account deleted!', 'The request account has been deleted, it may take a few minutes to disappear.', 'success');

        return redirect()->route('admin.gsuite.accounts.index');
    }
}
