<?php

namespace App\Model;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MapField
 * @package App\Model
 *
 * @method static create(array $attributes = [])
 * @method save(array $options = [])
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
}
