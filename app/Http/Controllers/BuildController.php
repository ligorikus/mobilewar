<?php

namespace App\Http\Controllers;

use App\Model\BuildProcess;
use App\Model\MapField;
use Illuminate\Http\Request;
use App\Model\MapFieldBuild;
use App\Model\MapFieldFarm;
use App\Model\MapFieldEntity;

class BuildController extends Controller
{
    public function build_farm(MapFieldFarm $farm)
    {
    	$this->build($farm);
    }

    public function build_construction(MapFieldBuild $build)
    {
    	$this->build($build);
    }

    private function build(MapFieldEntity $entity)
    {
        $max_queue_processes = 3;
        /** @var MapField $map_field */
        $map_field = auth()->user()->map_fields()->first();
        if ($map_field->build_processes->count() < $max_queue_processes) {
        	$process = $map_field->build_processes()->create([
        		'build_id' => $entity->id,
        		'build_type' => get_class($entity),
        		'progress' => 0,
        		'status' => true
        	]);
        	$map_field->build_processes->push($process);
        }
        dd($map_field->build_processes);
    }
}
