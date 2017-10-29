<?php

namespace App\Services;

use App\Models\Patient;

class PatientService extends BaseService
{
    protected $supportedInclude = array();

    protected $clauseProperties = array(
        'id' => 'id',
        'first_name' => 'first_name',
        'last_name' => 'last_name',
        'tax_code' => 'tax_code',
        'date_of_birth' => 'date_of_birth',
    );

    protected $rules = array(
        'first_name' => 'required|max:255',
        'last_name' => 'required|max:255',
        'tax_code' => 'required|string|max:16',
        'date_of_birth' => 'required|date'
    );

    public function getPatients($parameters) {
        if (empty($parameters))
        {
            return Patient::with("city")->get();
        }

        $whereClause = $this->getWhereClause($parameters);

        return Patient::with("city")->where($whereClause)->get();


    }
}
