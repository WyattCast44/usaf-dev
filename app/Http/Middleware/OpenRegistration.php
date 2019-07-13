<?php

namespace App\Http\Middleware;

use Closure;

class OpenRegistration
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
        if (!config('settings.open-registration')) {
            alert()->warning('Registration Disabled', 'The admin has disabled user registration, please try again later.');

            return redirect('login');
        }

        return $next($request);
    }
}
