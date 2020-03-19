<?php

namespace App\Http\Middleware;

use Closure;

class BuildProcessCheckMiddleware
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
        $build_processes = auth()->user()->map_fields()->first()->build_processes;
    //    dd($build_processes);
        return $next($request);
    }
}
