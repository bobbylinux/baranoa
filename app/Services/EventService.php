<?php

namespace App\Services;

use App\Models\Event;

class EventService extends BaseService
{
    public function getEvents($parameters = FALSE)
    {
        if (!$parameters || empty($parameters))
        {
            return Event::get();
        }

        $whereClause = $this->getWhereClause($parameters);
        return Event::where($whereClause)->get();
    }
}