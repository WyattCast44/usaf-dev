<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Wyattcast44\GSuite\GSuite;
use App\Http\Controllers\Controller;
use App\Rules\ValidGSuiteGroupEmail;

class GSuiteGroupsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
    }
    
    public function index(GSuite $gsuite)
    {
        $groups = $gsuite->groups()->list();

        return view('admin.gsuite.groups.index', ['groups' => $groups]);
    }

    public function show(GSuite $gsuite, $email)
    {
        $group = $gsuite->groups()->get($email);

        if ($group === null) {
            return abort(404);
        }

        return view('admin.gsuite.groups.show', ['group' => $group]);
    }

    public function create()
    {
        return view('admin.gsuite.groups.create');
    }

    public function store(Request $request, GSuite $gsuite)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', new ValidGSuiteGroupEmail],
            'description' => 'required|string|max:512'
        ]);

        $gsuite->groups()->insert($request->email, $request->name, $request->description);

        alert('Group created!', 'Your new group has been created, it may take a few minutes to appear.', 'success');

        return redirect()->route('admin.gsuite.groups.index');
    }

    public function refresh(GSuite $gsuite)
    {
        $gsuite->groups()->flushCache();
        
        return redirect()->route('admin.gsuite.groups.index');
    }
}
