<?php

namespace App\Http\Middleware;

use App\Model\Build;
use App\Model\BuildLevel;
use App\Model\FarmLevel;
use App\Model\GameResource;
use App\Model\MapFieldBuild;
use App\Model\MapFieldFarm;
use App\Model\MapFieldPopulation;
use App\Services\ResourceService;
use Carbon\Carbon;
use Closure;

class BuildProcessCheckMiddleware
{
    /**
     * @var ResourceService
     */
    private $resourceService;

    /**
     * RecountingResources constructor.
     *
     * @param ResourceService $resourceService
     */
    public function __construct(ResourceService $resourceService)
    {
        $this->resourceService = $resourceService;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        foreach (auth()->user()->map_fields as $map_field) {
            $build_processes = $map_field->build_processes;
            foreach ($build_processes->where('status', true) as $build_process) {
                /** @var MapFieldBuild|MapFieldFarm $build */
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
                $builds = Build::all();
                $main_building = $warehouse = $map_field
                    ->builds
                    ->where('build_level.build_id', $builds->where('title', 'main_building')->first()->id)
                    ->first()
                    ->build_level
                    ->options
                    ->first();

                $build_level = $build_process->build_type === MapFieldBuild::class ? $build->build_level : $build->farm_level;
                $build_type = get_class($build) === MapFieldBuild::class ? 'build' : 'farm';
                $build_id_str = $build_type.'_id';
                $next_level_build = $level_class::with(['time'])
                    ->where($build_id_str, $build_level->$build_id_str)
                    ->where('level', $build_level->level + 1)
                    ->first();
                $seconds_left = floor($next_level_build->time->time * (float) $main_building->value) - $seconds_passed;

                if ($seconds_left <= 0) {
                    $recount_time = Carbon::parse($build_process->start_time)->addSeconds($next_level_build->time->time);

                    $this->resourceService->recount($map_field, $recount_time);

                    $build_type = $build_process->build_type === MapFieldBuild::class ? 'build' : 'farm';
                    $build_level_id = $build_type.'_level_id';

                    /** @var MapFieldPopulation $population */
                    $population = $map_field->population;
                    $population->setPopulation($next_level_build->population + $population->population);
                    $population->save();
                    $build->$build_level_id = $next_level_build->id;
                    $build->save();
                    $build->refresh();
                    if (isset($next_level_build->production)) {
                        $this->resourceService->recount_production($map_field, GameResource::find($build->farm_level->farm->game_resource_id));
                    }
                    $this->resourceService->recount_production($map_field, GameResource::where('title', 'corn')->first());
                    $build_process->delete();
                }
            }
        }

        return $next($request);
    }
}
