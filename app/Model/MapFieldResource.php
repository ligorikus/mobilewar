<?php

namespace App\Model;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

class MapFieldResource extends Model
{
	use Cachable;
	
	protected $fillable = [
		'map_field_id',
		'game_resource_id',
		'count'
	];

    public function map_field()
    {
    	return $this->belongsTo(MapField::class);
    }
}
