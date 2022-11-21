<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Models\Estados;
use App\Models\Zonas;
use App\Models\Areas;
use App\Models\Hogares;
use Spatie\Permission\Models\Role;

class UserController extends Controller
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
                'name' => 'Usuarios',
            ]
        ];

        return view('users.index', compact('breadcrumb'));
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
                'link' => route('usuario.index'),
                'name' => 'Usuarios'
            ],
            [
                'link' => '#',
                'name' => 'Crear Usuario'
            ]
        ];

        $estado = Estados::all('id', 'estado');
        $zona = Zonas::all();
        $area = Areas::all();
        $hogar = Hogares::all();
        $roles = Role::select('id', 'name')->orderBy('name')->get();


        return view('users.create', compact('breadcrumb', 'estado', 'zona', 'area', 'hogar', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        dd($request);
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
