<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
        public function handle($request, Closure $next)
    {
        if (! $request->user() || ! $request->user()->hasRole('1')) {
            return redirect('/dashboard/list/students');
        }

        return $next($request);
    }
}

