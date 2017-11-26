<?php

namespace App\Services;

use App\Models\Doctor;

class DoctorService extends BaseService
{
    protected $clauseProperties = array(
        'id' => 'id',
        'lastname' => 'last_name',
        'firstname' => 'first_name',
        'enabled' => 'enabled'
    );

    public function getDoctors($parameters = FALSE)
    {
        if (!$parameters || empty($parameters))
        {
            return Doctor::orderBy('last_name')->orderBy('first_name')->get();
        }

        $whereClause = $this->getWhereClause($parameters);
        return Doctor::where($whereClause)->orderBy('last_name')->orderBy('first_name')->get();
    }

    public function deleteDoctor($id)
    {
        return Doctor::destroy($id);
    }

    public function updateDoctor($requst, $id)
    {
        $doctor = Doctor::where('id',$id)->firstOrFail();

        $doctor->first_name = $requst->firstname;
        $doctor->last_name = $requst->lastname;
        $doctor->discipline_id = $requst->discipline;
        $doctor->enabled = $requst->enabled;

        return $doctor->save();
    }
}