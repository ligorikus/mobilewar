<?php

namespace App\Http\Controllers;

use App\Model\MapField;
use App\Model\MapFieldType;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index(Request $request)
    {
        $size = 11;
        $max_n = (int) sqrt(MapField::count());
        $main_user_village = \auth()->user()->map_fields()->first();
        $x_coord = $main_user_village->x_coord;
        $y_coord = $main_user_village->y_coord;
        if ($request->x !== null) {
            $x_coord = $request->x;
        }
        if ($request->y !== null) {
            $y_coord = $request->y;
        }
        $start_x = (int) ($x_coord - floor($size / 2) >= 0 ? $x_coord - floor($size / 2) : 0);
        $end_x = (int) ($x_coord + floor($size / 2) < $max_n ? $x_coord + floor($size / 2) : $max_n - 1);

        $start_y = (int) ($y_coord - floor($size / 2) >= 0 ? $y_coord - floor($size / 2) : 0);
        $end_y = (int) ($y_coord + floor($size / 2) < $max_n ? $y_coord + floor($size / 2) : $max_n - 1);

        $map_fields = MapField::with('users')
            ->where('x_coord', '>=', $start_x)
            ->where('x_coord', '<=', $end_x)
            ->where('y_coord', '>=', $start_y)
            ->where('y_coord', '<=', $end_y)
            ->get();

        $map_field_types = MapFieldType::all();
        $map = [];
        for ($i = $start_x; $i <= $end_x; $i++) {
            for ($j = $start_y; $j <= $end_y; $j++) {
                $map_field = $map_fields->where('x_coord', $i)->where('y_coord', $j)->first();
                if ($map_field->users->count() > 0) {
                    $map[$i][$j] = 'new_village';
                    continue;
                }
                switch ($map_field_types->where('id', $map_field->map_field_type_id)->first()->name) {
                    case 'default':
                    case 'corn_land':
                    case 'super_corn_land':
                        $map[$i][$j] = 0;
                        break;
                    case 'clay_land_less_wood':
                    case 'clay_land_less_iron':
                        $map[$i][$j] = 1;
                        break;
                    case 'wood_land_less_iron':
                    case 'wood_land_less_clay':
                        $map[$i][$j] = 2;
                        break;
                    case 'iron_land_less_wood':
                    case 'iron_land_less_clay':
                        $map[$i][$j] = 3;
                        break;
                    default:
                        $map[$i][$j] = 0;
                        break;
                 }
            }
        }

        return view('map', [
            'map' => $map,
        ]);
    }
}
