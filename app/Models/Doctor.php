<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    /**
     * Get the doctor's discipline.
     */
    public function discipline()
    {
        return $this->belongsTo('App\Models\Discipline');
    }
    /**
     * Get the pathological conditions made by doctor
     */
    public function pathologicalConditions()
    {
        return $this->morphMany('\App\Models\PathologicalCondition', 'author');
    }
}
