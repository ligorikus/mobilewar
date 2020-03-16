<?php

use App\Model\Nation;
use Illuminate\Database\Seeder;

class NationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nation::create(['name' => 'russian']);
        Nation::create(['name' => 'ukraine']);
        Nation::create(['name' => 'poland']);
    }
}
