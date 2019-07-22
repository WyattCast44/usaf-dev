<?php

namespace App\Http\Controllers\Admin;

use App\Models\Users\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
    }

    public function create()
    {
        return view('admin.users.create');
    }
    
    public function index()
    {
        return view('admin.users.index', ['users' => User::paginate(10)]);
    }

    public function show(User $user)
    {
        return view('admin.users.show', ['user' => $user->load(['apps'])]);
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            Arr::only(User::rules(), ['first_name', 'last_name', 'middle_name', 'email'])
        );

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.users.index');
    }
}
