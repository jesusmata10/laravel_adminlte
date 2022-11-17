<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipios;
use App\Models\Parroquias;
use App\Models\Ciudades;

class EntidadesController extends Controller
{
    public function municipioAjaxUser(Request $request)
    {
        //dd($request->all());
        if ($request->ajax()) {
            // $lista = Municipio::listaMunicipios($request->entidad_id);
            $lista = Municipios::where('estados_id', $request->estado_id)->get();
            // dd($lista);
            echo '<option disabled selected value="">Seleccione una opci&oacute;n</option>';
            // echo '<option value="TODOS">TODOS LOS MUNICIPIOS</option>';

            foreach ($lista as $value) {
                echo '<option value=' . $value->id . '>' . $value->municipio . '</option>';
            }
        }
    }

    public function parroquiaAjaxUser(Request $request)
    {
        //dd($request);
        if ($request->ajax()) {
            // $lista = Parroquia::listaParroquias($request->municipio_id);
            $lista = Parroquias::where('municipios_id', $request->municipio_id)->get();

            echo '<option disabled selected value="">Seleccione una opci&oacute;n</option>';
            // echo '<option value="TODAS">TODAS LAS PARROQUIAS</option>';

            foreach ($lista as $value) {
                echo '<option value=' . $value->id . '>' . $value->parroquia . '</option>';
            }
        }
    }

    public function ciudadAjaxUser(Request $request)
    {
        ($request);
        if ($request->ajax()) {
            // $lista = Municipio::listaMunicipios($request->entidad_id);
            $lista = Ciudades::where('estados_id', $request->estado_id)->get();

            // dd($lista);
            echo '<option disabled selected value="">Seleccione una opci&oacute;n</option>';
            // echo '<option value="TODOS">TODOS LOS MUNICIPIOS</option>';

            foreach ($lista as $value) {
                echo '<option value=' . $value->id . '>' . $value->ciudad . '</option>';
            }
        }
    }
}
