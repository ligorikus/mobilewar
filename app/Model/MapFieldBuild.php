<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MapFieldBuild extends Model
{
    protected $fillable = [
        'build_level_id', 'permanent'
    ];

    public function build_level()
    {
        return $this->belongsTo(BuildLevel::class);
    }
}
