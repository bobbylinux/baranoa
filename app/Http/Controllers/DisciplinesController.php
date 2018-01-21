<?php

namespace App\Http\Controllers;

use App\Services\DisciplineService;
use App\Services\SettingService;
use Illuminate\Http\Request;

class DisciplinesController extends Controller
{
    private $disciplines;
    private $settings;

    public function __construct(DisciplineService $disciplines, SettingService $settings)
    {
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
        $disciplines = $this->disciplines->getDisciplines();
        return view('disciplines.index', compact('disciplines', 'menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->disciplines->createDiscipline($request);
        return redirect('disciplines');
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
        $this->disciplines->updateDiscipline($request, $id);
        return redirect('disciplines');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$this->disciplines->deleteDiscipline($id)) {
            $discipline = $this->disciplines->getDisciplines(array("id" => $id));
        }

        return redirect('disciplines');
    }
}
