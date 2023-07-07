<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermisosController extends Controller
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
                'name' => 'Configuración'
            ],
            [
                'link' => '#',
                'name' => 'Permisos'
            ]
        ];

        $permisos = Permission::select('id', 'name')->paginate(5);
        //@dump($permisos);

        return view('permisos.index', compact('permisos', 'breadcrumb'));
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
                'link' => '#',
                'name' => 'Configuración'
            ],
            [
                'link' => '#',
                'name' => 'Crear Permisos'
            ]
        ];

        return view('permisos.create', compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$permission = Permission::create(['name' => 'edit articles']);
        $permission = new Permission();
        $permission->name = $request->name;
        $permission->description = $request->description;
        $permission->save();

        if ($permission->save()) {
            return redirect()->route('permisos.index')->with('success', __('¡Permiso creado sastifactoriamente!'));
        }

        return redirect()->route('permisos.create')->with('error', __('messages.information_not_stored'));

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
