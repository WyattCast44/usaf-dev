<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class UsersController extends Controller
{
    public function show(Request $request)
    {
        $user = new UserResource($request->user());

        return $user;
    }
}
