<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BuildLevelOptionType
 * @package App\Model
 *
 * @method static create(array $attributes = [])
 * @method Builder where($column, $operator = null, $value = null, $boolean = 'and')
 * @method first($columns = ['*'])
 */
class BuildLevelOptionType extends Model
{
    public $timestamps = false;

    public function options()
    {
        return $this->hasMany(BuildLevelOption::class);
    }
}
