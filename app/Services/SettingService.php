<?php

namespace App\Services;

use App\Models\Setting;

class SettingService extends BaseService
{
    protected $clauseProperties = array(
        'key' => 'key',
        'value' => 'value'
    );

    public function getSetting($parameters = FALSE)
    {

        if (!$parameters || empty($parameters))
        {
            return Patient::all();
        }

        $whereClause = $this->getWhereClause($parameters);

        return Setting::where($whereClause)->first();
    }
}