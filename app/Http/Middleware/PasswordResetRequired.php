<?php

namespace App\Http\Middleware;

use Closure;

class PasswordResetRequired
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->password_reset_required) {
            return view('auth.password.reset');
        }

        return $next($request);
    }
}
