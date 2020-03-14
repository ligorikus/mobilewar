<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MapFieldType
 * @package App\Model
 *
 * @method static create(array $attributes = [])
 */
class MapFieldType extends Model
{
	public $timestamps = false;

    public function resources()
    {
    	return $this->hasMany(MapFieldTypeResource::class);
    }
}
