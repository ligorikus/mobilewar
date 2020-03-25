<?php

namespace App\Http\Controllers;

use App\Model\Build;
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
        $build->load('build_level');
        $game_resources = GameResource::all();
        $map_field = auth()->user()->map_fields()->first();
        $build_processes = $map_field->build_processes;
        $current_build = $build_processes->where('build_type', get_class($build))->where('build_id', $build->id)->count();
        $resources = $map_field->resources;

        $builds = Build::all();
        $main_building = $warehouse = $map_field
            ->builds
            ->where('build_level.build_id', $builds->where('title','main_building')->first()->id)
            ->first()
            ->build_level
            ->options
            ->first();

        $next_level_build = null;
        if ($build->build_level->level < $build->build_level->build->levels->max('level')) {
            $next_level_build = BuildLevel::with(['resources', 'time'])
                ->where('build_id', $build->build_level->build_id)
                ->where('level', $build->build_level->level+$current_build+1)
                ->first();
            $build_time = floor($next_level_build->time->time*(float)$main_building->value);
        }
        return view('city.build', compact(
            'build',
            'game_resources',
            'next_level_build',
            'build_processes',
            'resources',
            'build_time'
        ));
    }
}
