<?php

use Illuminate\Database\Seeder;
use App\Model\GameResource;

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
        	'title' => 'wood'
        ]);
        GameResource::create([
        	'title' => 'clay'
        ]);
        GameResource::create([
        	'title' => 'iron'
        ]);
        GameResource::create([
        	'title' => 'corn'
        ]);
    }
}
