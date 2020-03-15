<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MapFieldProduction extends Model
{
    protected $fillable = [
        'production',
        'game_resource_id'
    ];
}
