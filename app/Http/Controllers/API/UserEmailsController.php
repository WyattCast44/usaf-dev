<?php

namespace App\Http\Controllers\API;

use App\Rules\AllowedDomain;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserEmailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function show(Request $request)
    {
        return $request->user()->email;
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email', new AllowedDomain],
        ]);

        $request->user()->update([
            'email' => $request->email,
            'email_verified_at' => null,
        ]);

        return $request->user()->email;
    }
}
