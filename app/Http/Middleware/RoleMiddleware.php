<?php

namespace App\Http\Middleware;
// use\App\Http\Middleware\Auth;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
   public function handle($request, Closure $next, ...$roles)
{
    if (Auth::check() && in_array(Auth::User()->role, $roles)) {
        return $next($request);
    }

    return redirect()->route('Page not found');
}

}
