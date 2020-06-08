<?php

use App\Model\GameResource;
use Illuminate\Database\Seeder;

class GameResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GameResource::create([
            'title' => 'wood',
        ]);
        GameResource::create([
            'title' => 'clay',
        ]);
        GameResource::create([
            'title' => 'iron',
        ]);
        GameResource::create([
            'title' => 'corn',
        ]);
    }
}
