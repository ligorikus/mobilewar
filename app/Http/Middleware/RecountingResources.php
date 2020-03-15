<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;

class RecountingResources
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
        $map_fields = \auth()->user()->map_fields()->with(['resources','productions'])->get();
        foreach ($map_fields as $map_field) {
            foreach ($map_field->resources as $resource) {
                $production = $map_field->productions->where('game_resource_id', $resource->game_resource_id)->first()->production;
                $seconds_passed = $resource->updated_at->diffInSeconds(Carbon::now());
                $production_passed = intval($production * ($seconds_passed / 3600));
                if ($production_passed > 0) {
                    $resource->value += $production_passed;
                    $resource->save();
                }
            }
        }
        return $next($request);
    }
}
