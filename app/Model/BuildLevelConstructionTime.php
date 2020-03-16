<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BuildLevelConstructionTime extends Model
{
    public $timestamps = false;

    public function build_level()
    {
        return $this->belongsTo(BuildLevel::class);
    }
}
