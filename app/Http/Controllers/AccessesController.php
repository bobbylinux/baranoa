<?php

namespace App\Http\Controllers;

use App\Services\CycleService;
use App\Services\PatientService;
use App\Services\SettingService;
use Illuminate\Http\Request;

class AccessesController extends Controller
{
    private $patients;
    private $cycles;
    private $settings;

    public function __construct(PatientService $patient, SettingService $settings, CycleService $cycles)
    {
        $this->patients = $patient;
        $this->cycles = $cycles;
        $this->settings = $settings;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function beforeNewAccess($patient_id)
    {
        //il paziente ha già un ciclo?
        $cycle = $this->cycles->getPatientOpenedCycles($patient_id);
        return response()->json($cycle);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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