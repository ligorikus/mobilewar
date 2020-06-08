<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MapFieldTypeResource extends Model
{
    public $timestamps = false;

    public function type()
    {
        return $this->belongsTo(MapFieldType::class);
    }
}
