<?php

namespace App\Http\Controllers;

use App\Model\Build;
use App\Model\BuildLevel;
use App\Model\GameResource;
use Illuminate\Support\Collection;

class CityController extends Controller
{
    public function index()
    {
        $map_field = auth()->user()->map_fields()->with('builds')->first();

        return view('city.index', compact('map_field'));
    }

    public function view($index)
    {
        $game_resources = GameResource::all();
        $builds = Build::with(['conditions', 'levels', 'image'])->get();
        $map_field = auth()->user()->map_fields()->first();
        $build = $map_field->builds->where('index', $index - 1)->first();
        $main_building = $map_field
            ->builds
            ->where('build_level.build_id', $builds->where('title', 'main_building')->first()->id)
            ->first()
            ->build_level
            ->options
            ->first();
        $build_processes = $map_field->build_processes;

        if ($build !== null) {
            $build->refresh();
            $build->load('build_level');
            $current_build = $build_processes->where('build_type', get_class($build))->where('build_id', $build->id)->count();
            $resources = $map_field->resources;

            $next_level_build = null;
            if ($build->build_level->level < $build->build_level->build->levels->max('level')) {
                $next_level_build = BuildLevel::with(['resources', 'time'])
                    ->where('build_id', $build->build_level->build_id)
                    ->where('level', $build->build_level->level + $current_build + 1)
                    ->first();
                $build_time = floor($next_level_build->time->time * (float) $main_building->value);
            }
            $build_route = route('build.upgrade_construction', ['index' => $index]);

            return view('city.upgrade', compact(
                'build',
                'game_resources',
                'next_level_build',
                'build_processes',
                'resources',
                'build_time',
                'index',
                'build_route'
            ));
        }
        $map_field_builds = $map_field->builds->load('build_level.build');
        $map_field_farms = $map_field->farms->load('farm_level.farm');
        $resources = $map_field->resources;

        $can_build = new Collection();
        foreach ($builds as $build) {
            if ($build->conditions->count() === 0) {
                continue;
            }
            $conditions_are_met = true;
            foreach ($build->conditions as $condition) {
                if ($condition->build_condition_type === 0) {
                    $count_condition_build = $map_field_builds
                        ->where('build_level.build.id', $condition->build_condition_id)
                        ->where('build_level.level', '>=', $condition->level)->count();
                    if (!$condition->not_build && $count_condition_build === 0) {
                        $conditions_are_met = false;
                    } elseif ($condition->not_build && $count_condition_build > 0) {
                        $conditions_are_met = false;
                    }
                } else {
                    $count_condition_farm = $map_field_farms
                        ->where('farm_level.farm.id', $condition->build_condition_id)
                        ->where('farm_level.level', '>=', $condition->level)->count();
                    if (!$condition->not_build && $count_condition_farm === 0) {
                        $conditions_are_met = false;
                    } elseif ($condition->not_build && $count_condition_farm > 0) {
                        $conditions_are_met = false;
                    }
                }
            }
            if ($conditions_are_met) {
                $build->next_level = $build->levels()->with(['time', 'resources'])->where('level', 1)->first();
                $build->time = floor($build->next_level->time->time * (float) $main_building->value);
                $can_build->push($build);
            }
        }

        return view('city.new_build', compact(
            'game_resources',
            'can_build',
            'resources',
            'build_processes',
            'index'
        ));
    }
}
