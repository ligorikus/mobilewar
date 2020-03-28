<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Build
 * @package App\Model
 *
 * @method static create(array $attributes = [])
 */
class Build extends Model
{
    public $timestamps = false;

    public function conditions()
    {
        return $this->hasMany(BuildConstructionCondition::class);
    }

    public function levels()
    {
        return $this->hasMany(BuildLevel::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
