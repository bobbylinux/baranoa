<?php

namespace App\Http\Controllers;

use App\Services\SettingService;

class HomeController extends Controller
{

    private $settings;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SettingService $settings)
    {
        $this->middleware('auth');
        $this->settings = $settings;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = $this->settings->getSetting(array('key' => 'menu'));
        return view('index', compact('menu'));
    }
}
