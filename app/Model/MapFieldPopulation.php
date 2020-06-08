<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MapFieldPopulation extends Model
{
    protected $fillable = [
        'population',
    ];

    public function setPopulation($population)
    {
        $this->population = $population;
    }
}
