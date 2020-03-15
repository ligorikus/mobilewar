<?php

namespace App\Http\Controllers;

use App\Model\MapField;
use App\Model\MapFieldResource;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     */
    public function index()
    {
        $resources = MapFieldResource::with('game_resource')->get();
        /** @var MapField $map_field */
        $map_field = auth()->user()->map_fields()->with(['productions'])->first();
        return view('app', ['resources' => $resources, 'map_field' => $map_field]);
    }
}
