<?php


namespace App\Services;

use App\Model\Build;
use App\Model\GameResource;
use App\Model\MapField;
use App\Model\MapFieldResource;
use Carbon\Carbon;

class ResourceService
{
    /**
     * @param MapField $mapField
     */
    public function recount(MapField $mapField, Carbon $recount_time = null)
    {
        if ($recount_time === null) {
            $recount_time = Carbon::now();
        }
        /** @var MapFieldResource $resource */
        foreach ($mapField->resources as $resource) {
            $production = $mapField->productions->where('game_resource_id', $resource->game_resource_id)->first()->production;
            $seconds_passed = $resource->updated_at->diffInSeconds(Carbon::now());
            $production_passed = intval($production * ($seconds_passed / 3600));
            $builds = Build::all();
            $warehouse = $mapField
                ->builds
                ->where('build_level.build_id', $builds->where('title','warehouse')->first()->id)
                ->first()
                ->build_level
                ->options
                ->first();
            $barn = $mapField
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

    public function recount_production(MapField $mapField, GameResource $resource)
    {
        $production = 0;
        foreach ($mapField->farms->where('farm_level.farm.game_resource_id', $resource->id) as $farm) {
            $production += $farm->farm_level->production;
        }
        if ($resource->title === 'corn') {
            $production -= $mapField->population->population;
        }
        $mapFieldProduction = $mapField->productions()->where('game_resource_id', $resource->id)->first();
        $mapFieldProduction->production = $production;
        $mapFieldProduction->save();
        return $production;
    }
}