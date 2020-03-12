<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use App\Model\MapField;
use App\Model\MapFieldType;

class MapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $size = (int)$this->command->ask("Enter size of the world", 32);

        $map_field_types = MapFieldType::all();

       	for ($i = 0; $i < $size; $i++) {
       		for ($j = 0; $j < $size; $j++) {
       			$map_field = MapField::create(['x_coord' => $i, 'y_coord' => $j]);
       			$generator = rand(0, 100);
       			if ($generator <= 50) {
       				$map_field->map_field_type_id = $map_field_types->where('name', 'default')->first()->id;
       			} elseif ($generator <= 65) {
       				$map_field->map_field_type_id = $map_field_types->where('name', 'corn_land')->first()->id;
       			} elseif ($generator <= 70) {
       				$map_field->map_field_type_id = $map_field_types->where('name', 'super_corn_land')->first()->id;
       			} elseif ($generator <= 80) {
       				$map_field->map_field_type_id = rand(0, 1) ? $map_field_types->where('name', 'clay_land_less_wood')->first()->id : $map_field_types->where('name', 'clay_land_less_iron')->first()->id;
       			} elseif ($generator <= 90) {
              $map_field->map_field_type_id = rand(0, 1) ? $map_field_types->where('name', 'wood_land_less_iron')->first()->id : $map_field_types->where('name', 'wood_land_less_clay')->first()->id;       				
       			} else {
              $map_field->map_field_type_id = rand(0, 1) ? $map_field_types->where('name', 'iron_land_less_wood')->first()->id : $map_field_types->where('name', 'iron_land_less_clay')->first()->id;              				
       			}
            $map_field->save();
       		}
       	}
    }
}
