<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MapFieldBuild extends Model implements MapFieldEntity
{
    protected $fillable = [
        'build_level_id', 'permanent', 'index'
    ];

    public function build_level()
    {
        return $this->belongsTo(BuildLevel::class);
    }
}
