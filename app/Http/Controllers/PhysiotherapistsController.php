<?php

namespace App\Http\Controllers;

use App\Services\PhysiotherapistService;
use App\Services\SettingService;
use Illuminate\Http\Request;

class PhysiotherapistsController extends Controller
{
    private $physiotherapists;
    private $settings;

    public function __construct(PhysiotherapistService $physiotherapists, SettingService $settings)
    {
        $this->physiotherapists = $physiotherapists;
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
        $physiotherapists = $this->physiotherapists->getPhysiotherapists();
        return view('physiotherapists.index', compact('physiotherapists', 'menu'));
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
        $this->physiotherapists->updatePhysiotherapist($request, $id);
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
        if (!$this->physiotherapists->deletePhysiotherapist($id)) {
            $physiotherapist = $this->physiotherapists->getPhysiotherapists(array("id" => $id));
        }

        return redirect('physiotherapists');
    }
}
