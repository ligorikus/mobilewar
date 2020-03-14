<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Build extends Model
{
    public $timestamps = false;

    public function levels()
    {
        return $this->hasMany(BuildLevel::class);
    }
}
