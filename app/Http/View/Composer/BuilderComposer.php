<?php

namespace App\Http\View\Composer;

use App\Model\BuildLevel;
use App\Model\FarmLevel;
use App\Model\MapFieldBuild;
use App\Model\MapFieldFarm;
use Carbon\Carbon;
use Illuminate\View\View;

class BuilderComposer
{
    public function compose(View $view)
    {
        $build_process = auth()->user()->map_fields()->first()->build_processes->first();
        $view->with('build_process', $build_process);
        if ($build_process !== null) {
            $build = (new $build_process->build_type())->find($build_process->build_id);
            $seconds_passed = Carbon::now()->timestamp - Carbon::parse($build_process->start_time)->timestamp;

            switch ($build_process->build_type) {
                case MapFieldBuild::class:
                    $level_class = BuildLevel::class;
                    break;
                case MapFieldFarm::class:
                    $level_class = FarmLevel::class;
                    break;
                default:
                    continue;
            }

            $build_level = $build_process->build_type === MapFieldBuild::class ? $build->build_level : $build->farm_level;
            $build_type = get_class($build) === MapFieldBuild::class ? 'build' : 'farm';
            $build_id_str = $build_type.'_id';
            $next_level_build = $level_class::with(['time'])
                ->where($build_id_str, $build_level->$build_id_str)
                ->where('level', $build_level->level + 1)
                ->first();
            $seconds_left = $next_level_build->time->time - $seconds_passed;

            $view->with([
                'type'         => $build_process->build_type === MapFieldBuild::class ? 'build' : 'farm',
                'build'        => $build,
                'build_level'  => $build_level,
                'seconds_left' => $seconds_left,
            ]);
        }
    }
}
