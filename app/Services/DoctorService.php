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

    public function updateDoctor($request, $id)
    {
        $doctor = Doctor::where('id',$id)->firstOrFail();

        $doctor->first_name = $request->firstname;
        $doctor->last_name = $request->lastname;
        $doctor->discipline_id = $request->discipline;
        $doctor->enabled = $request->enabled;

        return $doctor->save();
    }

    public function createDoctor($request)
    {
        $doctor = new Doctor();

        $doctor->first_name = $request->firstname;
        $doctor->last_name = $request->lastname;
        $doctor->discipline_id = $request->discipline;
        $doctor->enabled = $request->enabled;

        return $doctor->save();
    }
}