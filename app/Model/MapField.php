<?php

namespace App\Model;

use Closure;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MapField
 * @package App\Model
 *
 * @method static create(array $attributes = [])
 * @method save(array $options = [])
 * @method static where($column, $operator = null, $value = null, $boolean = 'and')
 * @method doesntHave($relation, $boolean = 'and', Closure $callback = null)
 * @property integer $map_field_type_id
 *
 */
class MapField extends Model
{
	protected $fillable = [
		'x_coord',
		'y_coord',
		'map_field_type_id'
	];
	public $timestamps = false;

	public function users() 
	{
		return $this->belongsToMany(User::class, 'user_map_fields')->withTimestamps();
	}

	public function builds()
    {
        return $this->hasMany(MapFieldBuild::class);
    }

    public function farms()
    {
        return $this->hasMany(MapFieldFarm::class);
    }
}
