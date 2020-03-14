<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BuildLevel extends Model
{
    public $timestamps = false;

    public function resources()
    {
        return $this->hasMany(BuildLevelConstructionResource::class);
    }

    public function times()
    {
        return $this->hasMany(BuildLevelConstructionTime::class);
    }
}
