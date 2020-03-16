<?php

namespace App\Http\Middleware;

use App\Model\Build;
use App\Model\GameResource;
use App\Model\MapFieldResource;
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
            /** @var MapFieldResource $resource */
            foreach ($map_field->resources as $resource) {
                $production = $map_field->productions->where('game_resource_id', $resource->game_resource_id)->first()->production;
                $seconds_passed = $resource->updated_at->diffInSeconds(Carbon::now());
                $production_passed = intval($production * ($seconds_passed / 3600));
                $builds = Build::all();
                $warehouse = $map_field
                    ->builds
                    ->where('build_level.build_id', $builds->where('title','warehouse')->first()->id)
                    ->first()
                    ->build_level
                    ->options
                    ->first();
                $barn = $map_field
                    ->builds
                    ->where('build_level.build_id', $builds->where('title','barn')->first()->id)
                    ->first()
                    ->build_level
                    ->options
                    ->first();

                switch ($resource->game_resource->title) {
                    case 'corn':
                        $limiter = $barn;
                        break;
                    default:
                        $limiter = $warehouse;
                        break;
                }
                if ($production_passed > 0) {
                    $predicted_value = $resource->value + $production_passed;
                    $resource->value = $predicted_value > (int)$limiter->value ? (int)$limiter->value : $predicted_value;
                    $resource->save();
                } elseif ($resource->value > (int)$limiter->value) {
                    $resource->value = (int)$limiter->value;
                    $resource->save();
                }
            }
        }
        return $next($request);
    }
}
