<?php

namespace App\Http\Controllers;

use App\Model\BuildLevel;
use App\Model\BuildProcess;
use App\Model\GameResource;
use App\Model\MapFieldBuild;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $map_field = auth()->user()->map_fields()->with('builds')->first();
        return view('city.index', compact('map_field'));
    }

    public function view(MapFieldBuild $build)
    {
        $build->refresh();
        $game_resources = GameResource::all();
        $map_field = auth()->user()->map_fields()->first();
        $build_processes = $map_field->build_processes;
        $current_build = $build_processes->where('build_type', get_class($build))->where('build_id', $build->id)->count();
        $resources = $map_field->resources;

        $next_level_build = BuildLevel::with(['resources', 'time'])
            ->where('build_id', $build->build_level->build_id)
            ->where('level', $build->build_level->level+$current_build+1)
            ->first();

        return view('city.build', compact(
            'build',
            'game_resources',
            'next_level_build',
            'build_processes',
            'resources'
        ));
    }
}
