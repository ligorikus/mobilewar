<?php

namespace App\Http\Controllers;

use App\Model\FarmLevel;
use App\Model\GameResource;

class FarmController extends Controller
{
    public function index()
    {
        $map_field = auth()->user()->map_fields()->with('farms')->first();

        return view('farms.index', compact('map_field'));
    }

    public function view($index)
    {
        $game_resources = GameResource::all();
        $map_field = auth()->user()->map_fields()->first();
        $farm = $map_field->farms->where('index', $index - 1)->first();
        $farm->refresh();
        $farm->load('farm_level');
        $build_processes = $map_field->build_processes;
        $current_build = $build_processes->where('build_type', get_class($farm))->where('build_id', $farm->id)->count();
        $resources = $map_field->resources;

        $next_level_farm = FarmLevel::with('resources')
            ->where('farm_id', $farm->farm_level->farm_id)
            ->where('level', $farm->farm_level->level + 1)
            ->first();

        return view('farms.farm', compact(
            'farm',
            'game_resources',
            'next_level_farm',
            'build_processes',
            'resources'
        ));
    }
}
