<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MapFieldType.
 *
 * @method static create(array $attributes = [])
 */
class MapFieldType extends Model
{
    public $timestamps = false;

    protected $with = [
        'resources',
    ];

    public function resources()
    {
        return $this->hasMany(MapFieldTypeResource::class);
    }

    public function map_fields()
    {
        return $this->hasMany(MapField::class);
    }
}
