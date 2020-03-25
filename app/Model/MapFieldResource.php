<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MapFieldResource extends Model
{
    protected $fillable = [
        'value',
        'game_resource_id',
        'updated_at'
    ];

    public function game_resource()
    {
        return $this->belongsTo(GameResource::class);
    }
}
