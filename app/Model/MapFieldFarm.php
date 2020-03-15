<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MapFieldFarm extends Model
{
    protected $fillable = [
        'farm_level_id'
    ];

    protected $with = [
        'farm_level'
    ];

    public function farm_level()
    {
        return $this->belongsTo(FarmLevel::class);
    }
}
