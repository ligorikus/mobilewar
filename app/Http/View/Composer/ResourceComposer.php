<?php


namespace App\Http\View\Composer;

use App\Model\GameResource;
use App\Model\MapField;
use Illuminate\View\View;

class ResourceComposer
{
    public function compose(View $view) {
        $resources = GameResource::all();
        /** @var MapField $map_field */
        $map_field = auth()->user()->map_fields()->with(['productions', 'resources'])->first();

        $view->with(compact('resources', 'map_field'));
    }
}