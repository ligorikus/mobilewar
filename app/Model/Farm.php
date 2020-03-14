<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    public $timestamps = false;

    public function levels()
    {
    	return $this->hasMany(FarmLevel::class);
    }
}
