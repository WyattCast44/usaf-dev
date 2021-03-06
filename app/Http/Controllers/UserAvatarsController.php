<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserAvatarsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'avatar' => 'required|image'
        ]);
        
        if (!$request->file('avatar')->isValid()) {
            return back();
        }
        
        auth()->user()->update([
            'avatar' => Storage::put('avatar', $request->avatar, 'public'),
        ]);

        toast('Avatar Updated!', 'success', 'top');

        return back();
    }
}
