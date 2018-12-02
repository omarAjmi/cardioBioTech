<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthorizeAccess
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
        if ($request->route('id') == Auth::id()) {
            return $next($request);
        } else if (Auth::user()->admin) {
            return $next($request);
        }
        abort(403);
    }
}
