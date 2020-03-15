<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BuildLevelOption extends Model
{
    public $timestamps = false;

    protected $with = ['build_level_option_type'];

    public function build_level_option_type()
    {
        return $this->belongsTo(BuildLevelOptionType::class);
    }
}
