<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FarmLevelConstructionTime
 * @package App\Model
 *
 * @method create(array $attributes = [])
 */
class FarmLevelConstructionTime extends Model
{
	public $timestamps = false;

	public function farm_level()
    {
        return $this->belongsTo(FarmLevel::class);
    }
}
