<?php

namespace App\Http\Middleware;

use Closure;

class NoVillageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\auth()->user()->map_fields()->count() > 0) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
