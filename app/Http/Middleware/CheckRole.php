<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$roles
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('sigin')->with('error', 'Please login first.');
        }

        $user = Auth::user();

        if (!in_array($user->role, $roles)) {
            return redirect()->route('sigin')->with('error', 'Unauthorized access.');
        }

        return $next($request);
    }
}
