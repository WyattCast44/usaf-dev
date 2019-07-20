<?php

namespace App\Http\Controllers\Admin;

use App\Models\Users\User;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
    }
    
    public function index()
    {
        return view('admin.users.index', ['users' => User::paginate(10)]);
    }

    public function show(User $user)
    {
        return view('admin.users.show', ['user' => $user]);
    }
}
