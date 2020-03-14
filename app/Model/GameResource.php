<?php

namespace App\Model;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GameResource
 * @package App\Model
 *
 * @property integer $id
 * @property string $title
 */
class GameResource extends Model
{
    public $timestamps = false;

    public function farms()
    {
    	return $this->hasMany(Farm::class);
    }
}
