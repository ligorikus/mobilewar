<?php

namespace App\Model;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

class GameResource extends Model
{
    use Cachable;
}
