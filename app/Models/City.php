<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     *  get the patients born in city
     */
    public function patients()
    {
        return $this->hasMany('App\Models\Patients');
    }
}
