<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Physiotherapist extends Model
{
    /**
     * Get the pathological conditions made by physiotherapist
     */
    public function pathologicalConditions()
    {
        return $this->morphMany('\App\Models\PathologicalCondition', 'author');
    }
}
