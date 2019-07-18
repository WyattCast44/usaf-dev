<?php

namespace App\Http\Controllers\API;

use App\Models\Users\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user();

        $user->avatar = '';

        return $user;
    }

    public function index()
    {
        $users = User::all();
        
        return $users;
    }
}
