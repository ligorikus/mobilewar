<?php


namespace App\Http\View\Composer;


use App\Model\MapField;
use Illuminate\View\View;

class UserHeaderComposer
{
    public function compose(View $view) {
        $user = auth()->user();
        $map_field = $user->map_fields()->first();

        $view->with(compact('user', 'map_field'));
    }
}