<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    /**
     * Get the doctors by discipline.
     */
    public function doctors()
    {
        return $this->hasMany('App\Models\Doctors');
    }
}
