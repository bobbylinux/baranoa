<?php

namespace App\Services;

use App\Models\Patient;
use App\Models\PatientDetail;

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
        if (!$parameters || empty($parameters))
        {
            return Patient::with(["city", "lastDetail"])->get();
        }

        $whereClause = $this->getWhereClause($parameters);

        return Patient::with(["city", "details" => function ($query)
        {
            $query->max('id');
        }])->where($whereClause)->get();
    }

    public function getPatient($parameters)
    {
        $whereClause = $this->getWhereClause($parameters);

        return Patient::with(["city", "details" => function ($query)
        {
            $query->max('id');
        }])->where($whereClause)->first();
    }

    public function createPatient($request)
    {
        $patient = new Patient();

        $patient->last_name = $request->input('lastname');
        $patient->first_name = $request->input('firstname');
        $patient->tax_code = $request->input('taxcode');
        $patient->sex = $request->input('sex');
        $patient->date_of_birth = $request->input('birthdate');
        $patient->city_id = $request->input('birthcity');
        //detail
        $patient->details->address = $request->input('address');
        $patient->details->city_id = $request->input('addresscity');
        $patient->details->phone_number = $request->input('phonenumber');
        $patient->details->email = $request->input('email');

        $patient->save();

        $details = new PatientDetail();

        $details->patient_id = $patient->id;
        $details->address = $request->input('address');
        $details->city_id = $request->input('addresscity');
        $details->phone_number = $request->input('phonenumber');
        $details->email = $request->input('email');

        $details->save();
    }

    public function updatePatient($request, $id)
    {
        $patient = Patient::find($id);

        $patient->last_name = $request->input('lastname');
        $patient->first_name = $request->input('firstname');
        $patient->tax_code = $request->input('taxcode');
        $patient->sex = $request->input('sex');
        $patient->date_of_birth = $request->input('birthdate');
        $patient->city_id = $request->input('birthcity');
        $patient->save();

        //detail
        $details = new PatientDetail();

        $details->patient_id = $id;
        $details->address = $request->input('address');
        $details->city_id = $request->input('addresscity');
        $details->phone_number = $request->input('phonenumber');
        $details->email = $request->input('email');

        $details->save();
    }
}
