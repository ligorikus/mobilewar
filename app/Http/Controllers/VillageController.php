<?php

namespace App\Http\Controllers;

use App\Model\Build;
use App\Model\Farm;
use App\Model\FarmLevel;
use App\Model\GameResource;
use Illuminate\Http\Request;
use App\Model\MapField;
use App\Model\MapFieldType;

class VillageController extends Controller
{
    public function create_first()
    {
    	$map_field_type_default = MapFieldType::where('name', 'default')->first();
    	/** @var MapField $map_field */
    	$map_field = MapField::with('map_field_type')->where('map_field_type_id', $map_field_type_default->id)->doesnthave('users')->get()->random();
    	\auth()->user()->map_fields()->attach($map_field);

    	$population = 0;

    	$main_building = Build::with(['levels' => function ($query) {
    	    $query->where('level', 1);
        }])->where('title','main_building')->first();
    	$main_building_level = $main_building->levels->first();
        $map_field->builds()->create([
            'build_level_id' => $main_building_level->id
        ]);
        $population += $main_building_level->population;

    	$farms = Farm::with(['levels' => function ($query) {
            $query->where('level', 0);
        }])->get();

    	foreach ($farms as $farm) {
            $count_of_resource = $map_field->map_field_type->resources->where('game_resource_id', $farm->game_resource_id)->first()->count;
            $production = 0;
            for ($i = 0; $i < $count_of_resource; $i++) {
                $farm_level = $farm->levels->first();
                $production += $farm_level->production;
                $population += $farm_level->population;
                $map_field->farms()->create([
                    'farm_level_id' => $farm_level->id
                ]);
            }
            $map_field->productions()->create(['production' => $production, 'game_resource_id' => $farm->game_resource_id]);
        }

    	$map_field->population()->create(['population' => $population]);
    	$game_resources = GameResource::all();

    	foreach ($game_resources as $game_resource) {
            $map_field->resources()->create(['value' => 750, 'game_resource_id' => $game_resource->id]);
            if ($game_resource->title === 'corn') {
                $corn_production = $map_field->productions()->where('game_resource_id', $game_resource->id)->first();
                $corn_production->production -= $population;
                $corn_production->save();
            }
        }
    	return redirect()->route('home');
    }
}
