<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\user\CreateUserRequest;
use App\Http\Requests\user\EditUserRequest;
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
use App\Models\Pais;
use App\Models\Ciudades;
use App\Models\Municipios;
use App\Models\Parroquias;
use Illuminate\Support\Arr;

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
        $pais = Pais::all();
        $hogar = Hogares::all();
        $roles = Role::select('id', 'name')->orderBy('name')->get();


        return view('users.create', compact('breadcrumb', 'pais', 'estado', 'zona', 'area', 'hogar', 'roles'));
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

        //@dump(decrypt($id));
        $breadcrumb = [
            [
                'link' => route('usuario.index'),
                'name' => 'Usuarios'
            ],
            [
                'link' => '#',
                'name' => 'Editar Usuario'
            ]
        ];

        $estado = Estados::all('id', 'estado');
        $ciudad = Ciudades::all();
        $municipio = Municipios::all();
        $parroquia = Parroquias::all();
        $zona = Zonas::all();
        $area = Areas::all();
        $pais = Pais::all();
        $hogar = Hogares::all();
        $roles = Role::select('id', 'name')->orderBy('name')->get();

        $user = User::editar(decrypt($id));
        $rol = $user->roles[0];
        //$roles = Role::orderBy('name')->pluck('name', 'id');
        $roles = Role::select('id', 'name')->orderBy('id')->get();

        return view('users.edit', compact('breadcrumb', 'estado', 'zona', 'area', 'pais', 'hogar', 'roles', 'user', 'ciudad', 'municipio', 'parroquia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        //@dd($request);
        //@dump($request);
        $consulta = User::findOrFail(decrypt($id));
        //@dump($consulta);

        $input = $request->all();
        $input['user_id'] = Auth::id();
        $input['user_create'] = Auth::id();
        $input['status'] = (bool)1;
        $input['password'] = Hash::make($request->password);
        $input['fecha'] = Carbon::parse($request['fecha'])->format('Y-m-d');

        try {
            @dump(decrypt($id));
            //dd($consulta->id);
            DB::transaction(function () use ($request, $input, $consulta) {
                // update user
                $data = Arr::only($input, ['name', 'email', 'password']);
                $user = User::where('id', $consulta->id)->update($data);

                // se sincronizan los permisos con el usuario
                $user = User::where('id', decrypt($id))->first();
                $user->syncRoles($request->rol);

                // update personas
                $data = Arr::only($input, ['primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido', 'cedula', 'rif', 'fecha', 'telefono', 'celular', 'email', 'lugarnac', 'nacionalidad', 'sexo', 'parentesco', 'estatus', 'user_create', 'user_id']);
                $personas = Personas::where('id', $consulta->persona->id)->update($data);

                //update direccion
                $data = Arr::only($input, ['persona_id', 'estados_id', 'municipios_id', 'parroquias_id', 'ciudades_id', 'urbanizacion', 'zonas_id', 'nzona', 'areas_id', 'narea', 'hogares_id', 'nhagar', 'status']);
                $direccion = Direccion::where('personas_id', $consulta->personas->direccion->personas_id)->update($data);
            });

            return redirect()->route('usuario.index')->with('success', 'Usuario Actualizado Sastifactoriamente');
        } catch (QueryException $e) {
            \Log::error('UserController.update', [
                'message' => $e->getMessage(),
            ]);
            return redirect()->route('usuario.create')->with('error', 'Ha Ocurrido un error en el registro');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$prueba = User::find(decrypt($id));

        //$prueba->delete();
    }
}
