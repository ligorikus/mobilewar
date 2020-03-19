<?php

namespace App\Http\Controllers;

use App\Model\BuildLevel;
use App\Model\BuildProcess;
use App\Model\MapField;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Model\MapFieldBuild;
use App\Model\MapFieldFarm;
use App\Model\MapFieldEntity;

class BuildController extends Controller
{
    public function build_farm(MapFieldFarm $farm)
    {
    	return $this->build($farm);
    }

    public function build_construction(MapFieldBuild $build)
    {
    	return $this->build($build);
    }

    private function build(MapFieldEntity $entity)
    {
        $max_queue_processes = 1;
        /** @var MapField $map_field */
        $map_field = auth()->user()->map_fields()->first();
        if ($map_field->build_processes->count() < $max_queue_processes) {
            $start_time = Carbon::now();
            foreach ($map_field->build_processes as $build_process) {
                $build = (new $build_process->build_type)->find($build_process->build_id);
                $build_level = $build_process->build_type === MapFieldBuild::class ? $build->build_level : $build->farm_level;
                $next_level_build = BuildLevel::with(['resources', 'time'])
                    ->where('build_id', $build_level->build_id)
                    ->where('level', $build_level->level+1)
                    ->first();
            }

        	$process = $map_field->build_processes()->create([
        		'build_id' => $entity->id,
        		'build_type' => get_class($entity),
        		'progress' => 0,
        		'status' => true,
                'start_time' => $start_time
        	]);
        	$map_field->build_processes->push($process);
        }
        return redirect()->back();
    }
}
