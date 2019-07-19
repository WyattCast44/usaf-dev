<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\ValidGSuiteGroupEmail;
use App\Services\GSuite\GSuiteGroupRepository;

class GSuiteGroupsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
    }
    
    public function index(GSuiteGroupRepository $groups_repo)
    {
        $groups = $groups_repo->fetch();

        return view('admin.gsuite.groups.index', ['groups' => $groups]);
    }

    public function show(GSuiteGroupRepository $groups_repo, $email)
    {
        $group = $groups_repo->get($email);

        if ($group === null) {
            return abort(404);
        }

        return view('admin.gsuite.groups.show', ['group' => $group]);
    }

    public function create()
    {
        return view('admin.gsuite.groups.create');
    }

    public function store(Request $request, GSuiteGroupRepository $groups_repo)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => ['required', 'email', new ValidGSuiteGroupEmail],
            'description' => 'required|string|max:1026'
        ]);

        $groups_repo->create([
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description
        ]);

        alert('Group created!', 'Your new group has been created, but may take a few minutes to appear.', 'success');

        return redirect()->route('admin.gsuite.groups.index');
    }
}
