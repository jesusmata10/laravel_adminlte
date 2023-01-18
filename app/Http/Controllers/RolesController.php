<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
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
                'name' => 'Roles',
            ]
        ];

        $roles = Role::select('id', 'name')->orderBy('name')->get();

        return view('roles.index', compact('roles', 'breadcrumb'));
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
                'name' => 'Usuarios',
            ],
            [
                'link' => '#',
                'name' => 'Crear Usuario'
            ]
        ];

        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = new Role();
        $role->name = $request->name;
        $role->team_id = 1;
        $role->guard_name = 'web';
        $role->save();

        if ($role->save()) {
            return redirect()->route('roles.index')->with('success', __('¡Rol creado sastifactoriamente!'));
        }

        return redirect()->route('roles.create')->with('error', __('messages.information_not_stored'));
    }

    /*public function storeRolModulo(Request $request)
    {
        try {
            $rol = Role::select('id')->where('name', $request->rol)->first();

            ModuloHasRoles::where('role_id', $rol->id)->delete();

            if (isset($request->modulos)) {
                for ($i=0; $i <= count($request->modulos) - 1; $i++) {
                    $modulohasroles = new ModuloHasRoles();
                    $modulohasroles->role_id = $rol->id;
                    $modulohasroles->modulo_id = $request->modulos[$i];
                    $modulohasroles->save();
                }
            }

            return redirect('/roles')->with('success', __('messages.stored_information'));
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/roles')->with('error', __('messages.information_not_stored'));
        }

    }
    public function storeRolPermiso(Request $request)
    {
        try {
            $rol = Role::where('name', $request->rol)->first();
            $rol->syncPermissions($request->permiso);

            return redirect('/roles')->with('success', __('messages.stored_information'));
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/roles')->with('error', __('messages.information_not_stored'));
        }
    }*/

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
