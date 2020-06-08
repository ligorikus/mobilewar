<?php

namespace App\Model;

use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Class MapField.
 *
 * @method static create(array $attributes = [])
 * @method save(array $options = [])
 * @method static where($column, $operator = null, $value = null, $boolean = 'and')
 * @method doesntHave($relation, $boolean = 'and', Closure $callback = null)
 *
 * @property int $map_field_type_id
 * @property Collection(MapFieldProduction) $productions
 */
class MapField extends Model
{
    protected $fillable = [
        'x_coord',
        'y_coord',
        'map_field_type_id',
    ];
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_map_fields')->withTimestamps();
    }

    public function builds()
    {
        return $this->hasMany(MapFieldBuild::class)->orderBy('index');
    }

    public function farms()
    {
        return $this->hasMany(MapFieldFarm::class)->orderBy('index');
    }

    public function map_field_type()
    {
        return $this->belongsTo(MapFieldType::class);
    }

    public function resources()
    {
        return $this->hasMany(MapFieldResource::class);
    }

    public function productions()
    {
        return $this->hasMany(MapFieldProduction::class);
    }

    public function population()
    {
        return $this->hasOne(MapFieldPopulation::class);
    }

    public function build_processes()
    {
        return $this->hasMany(BuildProcess::class)->orderBy('start_time');
    }
}
