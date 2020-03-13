<?php

namespace App\Model;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

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
