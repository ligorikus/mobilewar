<?php

use App\Model\Build;
use App\Model\BuildConstructionCondition;
use App\Model\Farm;
use Illuminate\Database\Seeder;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $builds = Build::all();
        $farms = Farm::all();

        $corn_farm = $farms->where('title', 'corn_farm')->first();
        $wood_farm = $farms->where('title', 'wood_farm')->first();
        $iron_farm = $farms->where('title', 'iron_farm')->first();
        $clay_farm = $farms->where('title', 'clay_farm')->first();
        $main_building = $builds->where('title', 'main_building')->first();
        $sawmill = $builds->where('title', 'sawmill')->first();
        $brickworks = $builds->where('title', 'brickworks')->first();
        $iron_foundry = $builds->where('title', 'iron_foundry')->first();
        $flour_mill = $builds->where('title', 'flour_mill')->first();
        $bakery = $builds->where('title', 'bakery')->first();
        $collection_point = $builds->where('title', 'collection_point')->first();
        $arena = $builds->where('title', 'arena')->first();
        $tavern = $builds->where('title', 'tavern')->first();
        $barracks = $builds->where('title', 'barracks')->first();
        $big_barracks = $builds->where('title', 'big_barracks')->first();
        $barn = $builds->where('title', 'barn')->first();
        $warehouse = $builds->where('title', 'warehouse')->first();
        $market = $builds->where('title', 'market')->first();
        $residence = $builds->where('title', 'residence')->first();
        $embassy = $builds->where('title', 'embassy')->first();
        $palace = $builds->where('title', 'palace')->first();
        $forge = $builds->where('title', 'forge')->first();
        $stable = $builds->where('title', 'stable')->first();
        $big_stable = $builds->where('title', 'big_stable')->first();
        $academy = $builds->where('title', 'academy')->first();
        $workshop = $builds->where('title', 'workshop')->first();
        $cache = $builds->where('title', 'cache')->first();
        $chamber_of_commerce = $builds->where('title', 'chamber_of_commerce')->first();

        $conditions = [
            $sawmill->id => [
                [
                    'id' => $wood_farm->id,
                    'type' => 'farm',
                    'level' => 10
                ],
                [
                    'id' => $main_building->id,
                    'type' => 'build',
                    'level' => 5
                ],
            ],
            $brickworks->id => [
                [
                    'id' => $clay_farm->id,
                    'type' => 'farm',
                    'level' => 10
                ],
                [
                    'id' => $main_building->id,
                    'type' => 'build',
                    'level' => 5
                ],
            ],
            $iron_foundry->id => [
                [
                    'id' => $iron_farm->id,
                    'type' => 'farm',
                    'level' => 10
                ],
                [
                    'id' => $main_building->id,
                    'type' => 'build',
                    'level' => 5
                ],
            ],
            $flour_mill->id => [
                [
                    'id' => $corn_farm->id,
                    'type' => 'farm',
                    'level' => 5
                ],
            ],
            $bakery->id => [
                [
                    'id' => $corn_farm->id,
                    'type' => 'farm',
                    'level' => 10
                ],
                [
                    'id' => $main_building->id,
                    'type' => 'build',
                    'level' => 5
                ],
                [
                    'id' => $flour_mill->id,
                    'type' => 'build',
                    'level' => 5
                ]
            ],
            $arena->id => [
                [
                    'id' => $collection_point->id,
                    'type' => 'build',
                    'level' => 15
                ],
            ],
            $barracks->id => [
                [
                    'id' => $collection_point->id,
                    'type' => 'build',
                    'level' => 1
                ],
                [
                    'id' => $main_building->id,
                    'type' => 'build',
                    'level' => 3
                ],
            ],
            $big_barracks->id => [
                [
                    'id' => $barracks->id,
                    'type' => 'build',
                    'level' => 20,
                    'only_not_capital' => true
                ],
            ],
            $tavern->id => [
                [
                    'id' => $collection_point->id,
                    'type' => 'build',
                    'level' => 1
                ],
                [
                    'id' => $main_building->id,
                    'type' => 'build',
                    'level' => 3
                ],
            ],
            $barn->id => [
                [
                    'id' => $barn->id,
                    'type' => 'build',
                    'level' => 20
                ],
            ],
            $warehouse->id => [
                [
                    'id' => $warehouse->id,
                    'type' => 'build',
                    'level' => 20
                ],
            ],
            $market->id => [
                [
                    'id' => $warehouse->id,
                    'type' => 'build',
                    'level' => 1
                ],
                [
                    'id' => $barn->id,
                    'type' => 'build',
                    'level' => 1
                ],
                [
                    'id' => $main_building->id,
                    'type' => 'build',
                    'level' => 3
                ],
            ],
            $embassy->id => [
                [
                    'id' => $main_building->id,
                    'type' => 'build',
                    'level' => 1
                ],
            ],
            $residence->id => [
                [
                    'id' => $main_building->id,
                    'type' => 'build',
                    'level' => 5
                ],
                [
                    'id' => $palace->id,
                    'type' => 'build',
                    'level' => 1,
                    'not_build' => true
                ],
            ],
            $palace->id => [
                [
                    'id' => $main_building->id,
                    'type' => 'build',
                    'level' => 5
                ],
                [
                    'id' => $residence->id,
                    'type' => 'build',
                    'level' => 1,
                    'not_build' => true
                ],
                [
                    'id' => $embassy->id,
                    'type' => 'build',
                    'level' => 1
                ]
            ],
            $academy->id = [
                [
                    'id' => $barracks->id,
                    'type' => 'build',
                    'level' => 3
                ],
            ],
            $forge->id => [
                [
                    'id' => $main_building->id,
                    'type' => 'build',
                    'level' => 3
                ],
                [
                    'id' => $academy->id,
                    'type' => 'build',
                    'level' => 1
                ],
            ],
            $chamber_of_commerce->id => [
                [
                    'id' => $market->id,
                    'type' => 'build',
                    'level' => 20
                ],
                [
                    'id' => $academy->id,
                    'type' => 'build',
                    'level' => 10
                ]
            ],
            $workshop->id => [
                [
                    'id' => $main_building->id,
                    'type' => 'build',
                    'level' => 5
                ],
                [
                    'id' => $academy->id,
                    'type' => 'build',
                    'level' => 10
                ]
            ],
            $stable->id => [
                [
                    'id' => $forge->id,
                    'type' => 'build',
                    'level' => 3
                ],
                [
                    'id' => $academy->id,
                    'type' => 'build',
                    'level' => 5
                ],
            ],
            $big_stable->id => [
                [
                    'id' => $stable->id,
                    'type' => 'build',
                    'level' => 20,
                    'only_not_capital' => true
                ],
            ],
        ];

        foreach ($conditions as $build_id => $condition) {
            foreach ($condition as $element) {
                /** @var BuildConstructionCondition $build_construction_condition */
                $build_construction_condition = new BuildConstructionCondition();
                $build_construction_condition->build_id = $build_id;
                $build_construction_condition->build_condition_id = $element['id'];
                $build_construction_condition->build_condition_type = $element['type'] === 'build' ? 0 : 1;
                $build_construction_condition->level = $element['level'];
                $build_construction_condition->not_build = isset($element['not_build']) && $element['not_build'];
                $build_construction_condition->only_not_capital = isset($element['only_not_capital']) && $element['only_not_capital'];

                $build_construction_condition->save();
            }
        }
    }
}
