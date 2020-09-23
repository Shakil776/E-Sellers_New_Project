<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class RedirectIfNotShopper
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = "shopper")
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('/login'); 
        }

        return $next($request);
    }
}
