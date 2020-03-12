<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use App\Model\GameResource;
use App\Model\MapField;

class MapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$game_resources = GameResource::all();
    	$clay  = $game_resources->where('title', 'clay')->first();
    	$wood = $game_resources->where('title', 'wood')->first();
    	$iron = $game_resources->where('title', 'iron')->first();
    	$corn = $game_resources->where('title', 'corn')->first();
        $max_x = 32;
       	$max_y = 32;
       	$map_fields = new Collection();
       	for ($i = 0; $i < $max_x; $i++) {
       		for ($j = 0; $j < $max_y; $j++) {
       			$map_field = MapField::create(['x_coord' => $i, 'y_coord' => $j]);
       			$generator = rand(0, 100);
       			if ($generator <= 50) {
       				$map_field->resources()->create([
       					'game_resource_id' => $corn->id,
       					'count' => 6
       				]);
       				$map_field->resources()->create([
       					'game_resource_id' => $clay->id,
       					'count' => 4
       				]);
       				$map_field->resources()->create([
       					'game_resource_id' => $wood->id,
       					'count' => 4
       				]);
       				$map_field->resources()->create([
       					'game_resource_id' => $iron->id,
       					'count' => 4
       				]);
       			} elseif ($generator <= 65) {
       				$map_field->resources()->create([
       					'game_resource_id' => $corn->id,
       					'count' => 9
       				]);
       				$map_field->resources()->create([
       					'game_resource_id' => $clay->id,
       					'count' => 3
       				]);
       				$map_field->resources()->create([
       					'game_resource_id' => $wood->id,
       					'count' => 3
       				]);
       				$map_field->resources()->create([
       					'game_resource_id' => $iron->id,
       					'count' => 3
       				]);
       			} elseif ($generator <= 70) {
       				$map_field->resources()->create([
       					'game_resource_id' => $corn->id,
       					'count' => 15
       				]);
       				$map_field->resources()->create([
       					'game_resource_id' => $clay->id,
       					'count' => 1
       				]);
       				$map_field->resources()->create([
       					'game_resource_id' => $wood->id,
       					'count' => 1
       				]);
       				$map_field->resources()->create([
       					'game_resource_id' => $iron->id,
       					'count' => 1
       				]);
       			} elseif ($generator <= 80) {
       				$what_less = rand();
       				$map_field->resources()->create([
       					'game_resource_id' => $corn->id,
       					'count' => 6
       				]);
       				$map_field->resources()->create([
       					'game_resource_id' => $clay->id,
       					'count' => 5
       				]);
       				$map_field->resources()->create([
       					'game_resource_id' => $wood->id,
       					'count' => $what_less ? 4 : 3
       				]);
       				$map_field->resources()->create([
       					'game_resource_id' => $iron->id,
       					'count' => $what_less ? 3 : 4
       				]);
       			} elseif ($generator <= 90) {
       				$what_less = rand();
       				$map_field->resources()->create([
       					'game_resource_id' => $corn->id,
       					'count' => 6
       				]);
       				$map_field->resources()->create([
       					'game_resource_id' => $clay->id,
       					'count' => $what_less ? 4 : 3
       				]);
       				$map_field->resources()->create([
       					'game_resource_id' => $wood->id,
       					'count' => 5
       				]);
       				$map_field->resources()->create([
       					'game_resource_id' => $iron->id,
       					'count' => $what_less ? 3 : 4
       				]);
       			} else {
       				$what_less = rand();
       				$map_field->resources()->create([
       					'game_resource_id' => $corn->id,
       					'count' => 6
       				]);
       				$map_field->resources()->create([
       					'game_resource_id' => $clay->id,
       					'count' => $what_less ? 4 : 3
       				]);
       				$map_field->resources()->create([
       					'game_resource_id' => $wood->id,
       					'count' => $what_less ? 3 : 4
       				]);
       				$map_field->resources()->create([
       					'game_resource_id' => $iron->id,
       					'count' => 5
       				]);
       			}
       		}
       	}
       	


    }
}
