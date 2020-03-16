<?php


namespace App\Http\View\Composer;

use App\Model\Build;
use App\Model\GameResource;
use App\Model\MapField;
use Illuminate\View\View;

class ResourceComposer
{
    public function compose(View $view) {
        $builds = Build::all();
        $resources = GameResource::all();
        /** @var MapField $map_field */
        $map_field = auth()->user()->map_fields()->with(['productions', 'resources', 'builds'])->first();
        $warehouse = $map_field
            ->builds
            ->where('build_level.build_id', $builds->where('title','warehouse')->first()->id)
            ->first()
            ->build_level
            ->options
            ->first();
        $barn = $map_field
            ->builds
            ->where('build_level.build_id', $builds->where('title','barn')->first()->id)
            ->first()
            ->build_level
            ->options
            ->first();

        $view->with(compact('resources', 'map_field', 'warehouse', 'barn'));
    }
}