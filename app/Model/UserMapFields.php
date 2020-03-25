<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserMapFields extends Model
{
    public function map_field_id()
    {
    	 return $this->belongsTo(MapField::class);
    }

     public function user_id()
    {
    	 return $this->belongsTo(User::class);
    }
}
