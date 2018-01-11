<?php

namespace App\Http\Controllers;

use App\Services\PatientService;
use App\Services\CityService;
use App\Services\SettingService;
use Illuminate\Http\Request;

class PatientsController extends Controller
{

    private $patients;
    private $cities;
    private $settings;

    public function __construct(PatientService $patients, CityService $cities, SettingService $settings)
    {
        $this->patients = $patients;
        $this->cities = $cities;
        $this->settings = $settings;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parameters = request()->input();
        $menu = $this->settings->getSetting(array('key' => 'menu'));
        if ($parameters && max($parameters) != null) {
            $patients = $this->patients->getPatients($parameters);
        }
        //$cities = $this->cities->getSelectableCities();

        return view('patients.index', compact('patients','cities', 'menu'));
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
        $menu = $this->settings->getSetting(array('key' => 'menu'));
        $parameters['id'] = $id;
        $patients = $this->patients->getPatients($parameters);
        $cities = $this->cities->getSelectableCities();
        return view('patients.edit', compact('patients','cities', 'menu'));
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

        return redirect('physiotherapists');
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
    /**
     * Get a list of resource in json.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function datatable(Request $request)
    {
        $parameters = $request->input("term");

        return response()->json(['data' => "OK"]);

    }
}
