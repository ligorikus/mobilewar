<?php

use App\Model\GameResource;
use App\Model\MapFieldType;
use App\Model\MapFieldTypeResource;
use Illuminate\Database\Seeder;

class MapFieldTypeSeeder extends Seeder
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

        $default = MapFieldType::create(['name' => 'default']);
        $default->resources()->create([
        	'game_resource_id' => $corn->id,
        	'count' => 6
        ]);
        $default->resources()->create([
        	'game_resource_id' => $clay->id,
        	'count' => 4
        ]);
        $default->resources()->create([
        	'game_resource_id' => $wood->id,
        	'count' => 4
        ]);
        $default->resources()->create([
        	'game_resource_id' => $iron->id,
        	'count' => 4
        ]);

        $corn_land = MapFieldType::create(['name' => 'corn_land']);
        $corn_land->resources()->create([
        	'game_resource_id' => $corn->id,
        	'count' => 9
        ]);
        $corn_land->resources()->create([
        	'game_resource_id' => $clay->id,
        	'count' => 3
        ]);
        $corn_land->resources()->create([
        	'game_resource_id' => $wood->id,
        	'count' => 3
        ]);
        $corn_land->resources()->create([
        	'game_resource_id' => $iron->id,
        	'count' => 3
        ]);       

        $super_corn_land = MapFieldType::create(['name' => 'super_corn_land']);
        $super_corn_land->resources()->create([
        	'game_resource_id' => $corn->id,
        	'count' => 15
        ]);
        $super_corn_land->resources()->create([
        	'game_resource_id' => $clay->id,
        	'count' => 1
        ]);
        $super_corn_land->resources()->create([
        	'game_resource_id' => $wood->id,
        	'count' => 1
        ]);
        $super_corn_land->resources()->create([
        	'game_resource_id' => $iron->id,
        	'count' => 1
        ]);

        $clay_land_less_wood = MapFieldType::create(['name' => 'clay_land_less_wood']);
        $clay_land_less_wood->resources()->create([
        	'game_resource_id' => $corn->id,
        	'count' => 4
        ]);
        $clay_land_less_wood->resources()->create([
        	'game_resource_id' => $clay->id,
        	'count' => 5
        ]);
        $clay_land_less_wood->resources()->create([
        	'game_resource_id' => $wood->id,
        	'count' => 3
        ]);
        $clay_land_less_wood->resources()->create([
        	'game_resource_id' => $iron->id,
        	'count' => 4
        ]);

        $clay_land_less_iron = MapFieldType::create(['name' => 'clay_land_less_iron']);
        $clay_land_less_iron->resources()->create([
        	'game_resource_id' => $corn->id,
        	'count' => 4
        ]);
        $clay_land_less_iron->resources()->create([
        	'game_resource_id' => $clay->id,
        	'count' => 5
        ]);
        $clay_land_less_iron->resources()->create([
        	'game_resource_id' => $wood->id,
        	'count' => 4
        ]);
        $clay_land_less_iron->resources()->create([
        	'game_resource_id' => $iron->id,
        	'count' => 3
        ]);

        $wood_land_less_iron = MapFieldType::create(['name' => 'wood_land_less_iron']);
        $wood_land_less_iron->resources()->create([
        	'game_resource_id' => $corn->id,
        	'count' => 4
        ]);
        $wood_land_less_iron->resources()->create([
        	'game_resource_id' => $clay->id,
        	'count' => 4
        ]);
        $wood_land_less_iron->resources()->create([
        	'game_resource_id' => $wood->id,
        	'count' => 5
        ]);
        $wood_land_less_iron->resources()->create([
        	'game_resource_id' => $iron->id,
        	'count' => 3
        ]);

        $wood_land_less_clay = MapFieldType::create(['name' => 'wood_land_less_clay']);
        $wood_land_less_clay->resources()->create([
        	'game_resource_id' => $corn->id,
        	'count' => 4
        ]);
        $wood_land_less_clay->resources()->create([
        	'game_resource_id' => $clay->id,
        	'count' => 3
        ]);
        $wood_land_less_clay->resources()->create([
        	'game_resource_id' => $wood->id,
        	'count' => 5
        ]);
        $wood_land_less_clay->resources()->create([
        	'game_resource_id' => $iron->id,
        	'count' => 4
        ]);

        $iron_land_less_wood = MapFieldType::create(['name' => 'iron_land_less_wood']);
        $iron_land_less_wood->resources()->create([
        	'game_resource_id' => $corn->id,
        	'count' => 4
        ]);
        $iron_land_less_wood->resources()->create([
        	'game_resource_id' => $clay->id,
        	'count' => 4
        ]);
        $iron_land_less_wood->resources()->create([
        	'game_resource_id' => $wood->id,
        	'count' => 3
        ]);
        $iron_land_less_wood->resources()->create([
        	'game_resource_id' => $iron->id,
        	'count' => 5
        ]);

        $iron_land_less_clay = MapFieldType::create(['name' => 'iron_land_less_clay']);
        $iron_land_less_clay->resources()->create([
        	'game_resource_id' => $corn->id,
        	'count' => 4
        ]);
        $iron_land_less_clay->resources()->create([
        	'game_resource_id' => $clay->id,
        	'count' => 3
        ]);
        $iron_land_less_clay->resources()->create([
        	'game_resource_id' => $wood->id,
        	'count' => 4
        ]);
        $iron_land_less_clay->resources()->create([
        	'game_resource_id' => $iron->id,
        	'count' => 5
        ]);
    }
}
