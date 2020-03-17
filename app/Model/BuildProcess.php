<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BuildProcess extends Model
{
    protected $fillable = [
    	'build_id',
    	'build_type',
    	'progress',
    	'status'
    ];
}
