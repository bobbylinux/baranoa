<?php

namespace App\Http\Controllers;

use App\Services\DisciplineService;
use App\Services\DoctorService;
use App\Services\SettingService;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    private $doctors;
    private $disciplines;
    private $settings;

    public function __construct(DoctorService $doctors, DisciplineService $disciplines, SettingService $settings)
    {
        $this->doctors = $doctors;
        $this->disciplines = $disciplines;
        $this->settings = $settings;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = $this->settings->getSetting(array("key" => "menu"));
        $doctors = $this->doctors->getDoctors();
        $disciplines = $this->disciplines->getSelectableDisciplines();
        return view('doctors.index', compact('doctors','disciplines', 'menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $this->doctors->updateDoctor($request, $id);
        return redirect('doctors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$this->doctors->deleteDoctor($id)) {
            $doctor = $this->doctors->getDoctors(array("id" => $id));
        }

        return redirect('doctors');
    }
}
