<?php

namespace App\Http\Controllers;

use App\Model\GameResource;
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
        $resources = GameResource::all();
        /** @var MapField $map_field */
        $map_field = auth()->user()->map_fields()->with(['productions', 'resources'])->first();
        return view('index', [
            'resources' => $resources,
            'map_field' => $map_field,
        ]);
    }
}
