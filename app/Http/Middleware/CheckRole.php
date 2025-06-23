<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    // public function handle($request, Closure $next, ...$roles)
    // {
    //     if (!Auth::check()) {
    //         return redirect()->route('sigin')->with('error', 'Please login first.');
    //     }

    //     if (!in_array(Auth::user()->role, $roles)) {
    //         return redirect()->route('sigin')->with('error', 'Unauthorized access.');
    //     }

    //     return $next($request);
    // }
}
