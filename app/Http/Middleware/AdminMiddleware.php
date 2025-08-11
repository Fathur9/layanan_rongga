<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response; 

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
{
    if (Auth::check() && Auth::user()->role === 'admin') {
        return $next($request);
    }

    if ($request->expectsJson()) {
        return response()->json(['message' => 'Unauthorized. Admin only.'], 403);
    }

    abort(403, 'Unauthorized: Admin only.');
}

}
