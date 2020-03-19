<?php


namespace App\Http\View\Composer;
use App\Model\BuildLevel;
use App\Model\BuildProcess;
use App\Model\MapFieldBuild;
use Illuminate\View\View;

class BuilderComposer
{
    public function compose(View $view)
    {
        $build_process = auth()->user()->map_fields()->first()->build_processes->first();
        $view->with('build_process', $build_process);
        if ($build_process !== null) {
            $build = (new $build_process->build_type)->find($build_process->build_id);
            $seconds_passed = \Carbon\Carbon::createFromTimestamp($build_process->updated_at->timestamp)
                ->diffInSeconds(\Carbon\Carbon::now());
            $build_level = $build_process->build_type === MapFieldBuild::class ? $build->build_level : $build->farm_level;
            $next_level_build = BuildLevel::with(['resources', 'time'])
                ->where('build_id', $build_level->build_id)
                ->where('level', $build_level->level+1)
                ->first();
            $seconds_left = $next_level_build->time->time - $seconds_passed;

            $view->with([
                'type' => $build_process->build_type === MapFieldBuild::class ? 'build' : 'farm',
                'build' => $build,
                'build_level' => $build_level,
                'seconds_left' => $seconds_left
            ]);
        }
    }
}