<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Terapy extends Model
{
    /**
     * Get the accesses of the terapy
     */
    public function accesses()
    {
        return $this->belongsToMany('App\Models\Access');
    }
}
