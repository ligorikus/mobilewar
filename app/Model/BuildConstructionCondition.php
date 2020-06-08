<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BuildConstructionCondition.
 *
 * @property int $build_id
 * @property int $build_condition_id
 * @property string $build_condition_type
 * @property int $level
 * @property bool $not_build
 * @property bool $only_not_capital
 */
class BuildConstructionCondition extends Model
{
    protected $fillable = [
        'build_id',
        'build_condition_id',
        'build_condition_type',
        'level',
        'not_build',
        'only_not_capital',
    ];

    public $timestamps = false;
}
