<?php

namespace app\Services;

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
            return $this->filterPatient(Patient::all());
        }

        $whereClause = $this->getWhereClause($parameters);

        $patients = Patient::where($whereClause)->get();

        return $this->filterPatients($patients);
    }

    private function filterPatients($patients)
    {
        $data = [];

        foreach ($patients as $patient)
        {
            $entry = array(
                'id' => $patient->id,
                'last_name' => $patient->last_name,
                'first_name' => $patient->first_name,
                'tax_code' => $patient->tax_code,
                'date_of_birth' => $patient->date_of_birth
            );

            $data[] = $entry;

        }

        return $data;
    }
}
