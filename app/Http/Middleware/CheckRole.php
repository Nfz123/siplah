<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
    if (!$request->user() || !$request->user()->role || !in_array($request->user()->role->name, $roles)) {
    abort(403, 'Unauthorized');
    }

    return $next($request);
    }
}
