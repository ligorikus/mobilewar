<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserResource extends Model
{
    protected $fillable = [
        'value',
        'game_resource_id'
    ];
}
