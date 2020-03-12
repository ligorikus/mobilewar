<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MapFieldType extends Model
{
	public $timestamps = false;

    public function resources()
    {
    	return $this->hasMany(MapFieldTypeResource::class);
    }
}
