<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BuildProcess
 * @package App\Model
 *
 * @param Carbon $start_time
 */
class BuildProcess extends Model
{
    protected $fillable = [
    	'build_id',
    	'build_type',
    	'progress',
    	'status',
        'start_time'
    ];
}
