<?php

namespace App\Http\Controllers;

use App\Model\FarmLevel;
use App\Model\GameResource;
use App\Model\MapFieldFarm;
use Illuminate\Http\Request;

class FarmController extends Controller
{
    public function index()
    {
    	$map_field = auth()->user()->map_fields()->with('farms')->first();
        return view('farms.index', compact('map_field'));
    }

    public function view(MapFieldFarm $farm)
    {
        $game_resources = GameResource::all();
        $next_level_farm = FarmLevel::with('resources')
            ->where('farm_id', $farm->farm_level->farm_id)
            ->where('level', $farm->farm_level->level+1)
            ->first();

        return view('farms.farm', compact('farm', 'game_resources', 'next_level_farm'));
    }
}
