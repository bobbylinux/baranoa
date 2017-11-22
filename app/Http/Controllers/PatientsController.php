<?php

namespace App\Http\Controllers;

use App\Services\PatientService;
use App\Services\CityService;
use Illuminate\Http\Request;

class PatientsController extends Controller
{

    private $patients;
    private $cities;

    public function __construct(PatientService $patients, CityService $cities)
    {
        $this->patients = $patients;
        $this->cities = $cities;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parameters = request()->input();
        $patients = $this->patients->getPatients($parameters);
        $cities = $this->cities->getSelectableCities();

        return view('patients.index', compact('patients','cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patient_id = $request->input('patientId');

        return $patient_id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parameters = request()->input();

        $parameters['patientId'] = $id;
        $data = $this->patients->getPatients($parameters);

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parameters['id'] = $id;
        $patients = $this->patients->getPatients($parameters);
        $cities = $this->cities->getSelectableCities();
        return view('patients.edit', compact('patients','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
