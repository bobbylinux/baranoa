<?php

namespace App\Http\Controllers;

use App\Services\SettingService;
use App\Services\TherapyService;
use Illuminate\Http\Request;

class TherapiesController extends Controller
{
    private $therapies;
    private $settings;

    public function __construct(TherapyService $therapies, SettingService $settings)
    {
        $this->therapies = $therapies;
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
        $therapies = $this->therapies->getTherapies();
        return view('therapies.index', compact('therapies', 'menu'));
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->therapies->updateTherapy($request, $id);
        return redirect('therapies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (!$this->therapies->deleteTherapy($id)) {
            $therapy = $this->therapies->getTherapies(array("id" => $id));
        }

        return redirect('therapies');
    }
}
