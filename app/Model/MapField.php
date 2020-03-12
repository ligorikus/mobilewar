<?php

namespace App\Model;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

class MapField extends Model
{
    use Cachable;

	protected $fillable = [
		'x_coord',
		'y_coord'
	];

    public function resources()
    {
    	return $this->hasMany(MapFieldResource::class);
    }
}
