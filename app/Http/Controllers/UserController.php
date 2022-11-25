<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Models\Estados;
use App\Models\Zonas;
use App\Models\Areas;
use App\Models\Hogares;
use PhpParser\Node\Stmt\TryCatch;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use App\Models\User;
use App\Models\Personas;
use App\Models\Direccion;


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

        $users = User::all();

        return view('users.index', compact('breadcrumb', 'users'));
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

        $input = $request->all();
        $input['user_create'] = Auth::id();
        $input['personas_id'] = isset($request->personas_id) ? $request->personas_id : 0;
        $input['fecha'] = Carbon::parse($request['fecha'])->format('Y-m-d');
        $input['remember_token'] = Str::random(10);
        $input['password'] = Hash::make($request->password);
        $input['status'] = 1;
        //dd($input);

        try {
            DB::transaction(function () use ($request, $input) {
                $user = User::create($input);
                $user->assignRole($request->rol);

                $input['user_id'] = $user->id;
                $persona = Personas::create($input);

                $personaDireccionSave = new Direccion();
                $personaDireccionSave->personas_id = $persona->id;
                $personaDireccionSave->estados_id = $request->estados_id;
                $personaDireccionSave->ciudades_id = $request->ciudades_id;
                $personaDireccionSave->municipios_id = $request->municipios_id;
                $personaDireccionSave->parroquias_id = $request->parroquias_id;
                $personaDireccionSave->urbanizacion = $request->urbanizacion;
                $personaDireccionSave->zonas_id = $request->tzona;
                $personaDireccionSave->nzona = $request->nzona;
                $personaDireccionSave->areas_id = $request->tcalle;
                $personaDireccionSave->narea = $request->ncalle;
                $personaDireccionSave->hogares_id = $request->tvivienda;
                $personaDireccionSave->nhogar = $request->nvivienda;
                $personaDireccionSave->status = 1;
                $personaDireccionSave->save();
            });
            return redirect()->route('usuario.index')->with('success', 'Usuario Creado Sastifactoriamente');
        } catch (QueryException $e) {
            \Log::error('UserController.store', [
                'message' => $e->getMessage(),
            ]);
            return redirect()->route('usuario.create')->with('error', 'Ha Ocurrido un error en el registro');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $input = $request->all();

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
