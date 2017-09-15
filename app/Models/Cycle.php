<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    /**
     * Get the accesses of cycle.
     */
    public function accesses()
    {
        return $this->hasMany('App\Models\Access');
    }
}
