<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $breadcrumb = [
            [
                'link' => '#',
                'name' => 'Home',
            ],
        ];

        $prueba = 'texto de prueba';
        
        return view('home', compact('breadcrumb', 'prueba'));
    }
}
