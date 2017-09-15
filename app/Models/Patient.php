<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    /**
     * Get the city where the patient is born.
     */
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    /**
     * Get the patient details.
     */
    public function details()
    {
        return $this->hasMany('App\Models\PatientDetail');
    }

}
