<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BuildLevelOptionType extends Model
{
    public $timestamps = false;

    public function options()
    {
        return $this->hasMany(BuildLevelOption::class);
    }
}
