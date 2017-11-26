<?php

namespace App\Services;

use App\Models\Patient;

class PatientService extends BaseService
{
    protected $supportedInclude = array();

    protected $clauseProperties = array(
        'id' => 'id',
        'firstname' => 'first_name',
        'lastname' => 'last_name',
        'taxcode' => 'tax_code',
        'birthdate' => 'date_of_birth',
        'birthcity' => 'city_id',
    );

    protected $rules = array(
        'first_name' => 'required|max:255',
        'last_name' => 'required|max:255',
        'tax_code' => 'required|string|max:16',
        'date_of_birth' => 'required|date'
    );

    public function getPatients($parameters = FALSE)
    {
        // TODO: understand how to get only last patient detail and not the entire collection using with method in Eloquent models.
        if (!$parameters || empty($parameters))
        {
            return Patient::with(["city", "details" => function ($query) {
                $query->max('id');
            }])->get();
        }

        $whereClause = $this->getWhereClause($parameters);

        return Patient::with(["city", "details" => function ($query)
        {
            $query->max('id');
        }])->where($whereClause)->get();
    }
}
