<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Nation.
 *
 * @method static create(array $attributes = [])
 */
class Nation extends Model
{
    public $timestamps = false;

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
