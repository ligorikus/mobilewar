<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\MapField;
use App\Model\GameResource;

class MapController extends Controller
{
    public function index($x_coord = null, $y_coord = null)
    {
    	$size = 10;
    	$max_n = 32;
    	if ($x_coord === null) {
    		$x_coord = 16;
    	}
    	if ($y_coord === null) {
    		$y_coord = 16;
    	}
    	$start_x = $x_coord - $size / 2 >= 0 ? $x_coord - $size / 2 : 0;
    	$end_x = $x_coord + $size / 2 <= $max_n ? $x_coord + $size / 2 : $max_n;

    	$start_y = $y_coord - $size / 2 >= 0 ? $y_coord - $size / 2 : 0;
    	$end_y = $y_coord + $size / 2 <= $max_n ? $y_coord + $size / 2 : $max_n;

    	$map_fields = MapField::with('resources')
    		->where('x_coord', '>=', $start_x)
    		->where('x_coord', '<', $end_x)
    		->where('y_coord', '>=', $start_y)
    		->where('y_coord', '<', $end_y)
    		->get();

    	$game_resources = GameResource::all();
    	$clay  = $game_resources->where('title', 'clay')->first();
    	$wood = $game_resources->where('title', 'wood')->first();
    	$iron = $game_resources->where('title', 'iron')->first();
    	$corn = $game_resources->where('title', 'corn')->first();
    	
    	$map = [];
    	for ($i = $start_x; $i < $end_x; $i++) {
    		for ($j = $start_y; $j < $end_y; $j++) {
    			$resources = $map_fields->where('x_coord', $i)->where('y_coord', $j)->first()->resources;
    			if ($resources->where('game_resource_id', $clay->id)->first()->count === 5) {
    				$map[$i][$j] = $clay->id;
    			} elseif ($resources->where('game_resource_id', $wood->id)->first()->count === 5) {
    				$map[$i][$j] = $wood->id;
    			} elseif ($resources->where('game_resource_id', $iron->id)->first()->count === 5) {
    				$map[$i][$j] = $iron->id;
    			} else {
    				$map[$i][$j] = $corn->id;
    			}
    		}
    	}
    	return view('map', [
    		'map' => $map,
    		'game_resources' => $game_resources
    	]);
    }
}
