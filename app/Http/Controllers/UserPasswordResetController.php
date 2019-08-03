<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\PasswordMinLength;
use Illuminate\Support\Facades\Hash;

class UserPasswordResetController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        
        if (!Hash::check($request->password, $user->password)) {
            alert('Unable to update password', 'The password entered did not match your current password, please try again.', 'warning');

            return back();
        }
        
        $this->validate($request, [
            'password' => 'required|string',
            'new_password' => ['required', 'string', 'confirmed', new PasswordMinLength]
        ]);

        $user->update(['password' => bcrypt($request->new_password)]);

        alert('Password Updated!', '', 'success');

        return back();
    }
}
