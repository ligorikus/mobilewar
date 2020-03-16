<?php

namespace App\Http\Controllers;

use App\Model\BuildLevel;
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
        $game_resources = GameResource::all();
        $next_level_build = BuildLevel::with(['resources', 'time'])
            ->where('build_id', $build->build_level->build_id)
            ->where('level', $build->build_level->level+1)
            ->first();

        return view('city.build', compact('build', 'game_resources', 'next_level_build'));
    }
}
