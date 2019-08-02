<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\PasswordMinLength;

class UserPasswordResetController extends Controller
{
    public function update(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string',
            'new_password' => ['required', 'string', 'confirmed', new PasswordMinLength]
        ]);

        $user = auth()->user();

        if ($user->password <> bcrypt($request->password)) {
            alert('Unable to update password', 'The password entered did not match your current password, please try again.', 'warning');

            return back();
        }

        alert('Password Updated!', 'success');

        return back();
    }
}
