<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    /**
     * Get the access cycle.
     */
    public function patient()
    {
        return $this->belongsTo('App\Models\Cycle');
    }

    /**
     * Get the access cycle.
     */
    public function cycle()
    {
        return $this->belongsTo('App\Models\Cycle');
    }
    /**
     * Get the access terapies
    */
    public function terapies()
    {
        return $this->belongsToMany('App\Models\Terapy');
    }
}
