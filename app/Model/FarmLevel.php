<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FarmLevel
 * @package App\Model
 *
 * @property integer $level
 */
class FarmLevel extends Model
{
	public $timestamps = false;

	public function production()
	{
		return $this->hasOne(FarmLevelProduction::class);
	}

	public function resources()
	{
		return $this->hasMany(FarmLevelConstructionResource::class);
	}

	public function times()
	{
		return $this->hasMany(FarmLevelConstructionTime::class);
	}
}
