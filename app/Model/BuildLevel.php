<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BuildLevel extends Model
{
    public $timestamps = false;

    public function build()
    {
        return $this->belongsTo(Build::class);
    }

    public function resources()
    {
        return $this->hasMany(BuildLevelConstructionResource::class);
    }

    public function time()
    {
        return $this->hasOne(BuildLevelConstructionTime::class);
    }

    public function options()
    {
        return $this->hasMany(BuildLevelOption::class);
    }

    public function map_field()
    {
        return $this->hasMany(MapFieldBuild::class);
    }
}
