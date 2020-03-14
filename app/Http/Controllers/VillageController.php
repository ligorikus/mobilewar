<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\MapField;
use App\Model\MapFieldType;

class VillageController extends Controller
{
    public function create_first()
    {
    	$map_field_type_default = MapFieldType::where('name', 'default')->first();
    	$map_field = MapField::where('map_field_type_id', $map_field_type_default->id)->doesnthave('users')->get()->random();
    	/** @var MapField $user_map_field */
    	$user_map_field = \auth()->user()->map_fields()->attach($map_field);
    	return redirect()->route('home');
    }
}
