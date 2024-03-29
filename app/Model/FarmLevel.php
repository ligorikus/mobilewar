<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FarmLevel.
 *
 * @property int $level
 */
class FarmLevel extends Model
{
    public $timestamps = false;

    protected $with = [
        'farm',
    ];

    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }

    public function resources()
    {
        return $this->hasMany(FarmLevelConstructionResource::class);
    }

    public function time()
    {
        return $this->hasOne(FarmLevelConstructionTime::class);
    }

    public function map_field()
    {
        return $this->hasMany(MapFieldFarm::class);
    }
}
