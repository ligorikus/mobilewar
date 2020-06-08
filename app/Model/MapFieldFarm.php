<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MapFieldFarm extends Model implements MapFieldEntity
{
    protected $fillable = [
        'farm_level_id', 'index',
    ];

    protected $with = [
        'farm_level',
    ];

    public function farm_level()
    {
        return $this->belongsTo(FarmLevel::class);
    }
}
