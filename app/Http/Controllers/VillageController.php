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
    	$map_field = MapField::where('map_field_type_id', $map_field_type_default->id)->doesnthave('users')->get()->random();
    	\auth()->user()->map_fields()->attach($map_field);

    	$main_building = Build::with(['levels' => function ($query) {
    	    $query->where('level', 1);
        }])->where('title','main_building')->first();
        $map_field->builds()->create([
            'build_level_id' => $main_building->levels->first()->id
        ]);

    	$farms = Farm::with(['levels' => function ($query) {
            $query->where('level', 0);
        }])->get();

    	foreach ($farms as $farm) {
            $map_field->farms()->create([
                'farm_level_id' => $farm->levels->first()->id
            ]);
        }

    	$game_resources = GameResource::all();

    	foreach ($game_resources as $game_resource) {
    	    \auth()->user()->resources()->create(['value' => 750, 'game_resource_id' => $game_resource->id]);
        }
    	return redirect()->route('home');
    }
}
