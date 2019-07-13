<?php

namespace App\Http\Controllers\Validators;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidateEmail
{
    public function __invoke(Request $request)
    {
        return Validator::make($request, User::rules('email'));
    }
}
