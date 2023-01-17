<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use App\Models\Pais;
use App\Models\Estados;
use App\Models\Ciudades;
use App\Models\Parroquias;
use App\Models\Municipios;
use App\Models\Areas;
use App\Models\Parentesco;
use App\Models\Hogares;
use App\Models\Zonas;
use Illuminate\Http\Request;
use App\Http\Requests\personas\PersonasCreateRequest;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumb = [
            [
                'link' => '#',
                'name' => 'Personas',
            ],
        ];

        return view('personas.index', compact('breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumb = [
            [
                'link' => route('persona.index'),
                'name' => 'Personas',
            ],
            [
                'link' => '#',
                'name' => 'Nueva Persona'
            ]
        ];

        $estado = Estados::all('id', 'estado');
        $zona = Zonas::all();
        $area = Areas::all();
        $pais = Pais::all();
        $hogar = Hogares::all();

        return view('personas.create', compact('breadcrumb', 'estado', 'zona', 'area', 'pais', 'hogar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonasCreateRequest $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function show(Personas $personas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function edit(Personas $personas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personas $personas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personas $personas)
    {
        //
    }
}
