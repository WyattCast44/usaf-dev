<?php

namespace App\Http\Middleware;

use Closure;

class AllowPasswordResets
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
        if (!config('settings.allow-password-resets')) {
            alert()->warning('Password Resets Disabled', 'The admin has disabled password resets, please contact them directly to reset your password');

            return redirect('login');
        }

        return $next($request);
    }
}
