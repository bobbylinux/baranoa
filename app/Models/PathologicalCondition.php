<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PathologicalCondition extends Model
{
    public function author()
    {
        return $this->morphTo();
    }
}