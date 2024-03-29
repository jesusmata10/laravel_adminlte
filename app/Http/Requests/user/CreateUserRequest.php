<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'cedula' => 'required|unique:personas,cedula',
            'email' => 'required|unique:users,email',
            'primer_nombre' => 'required',
            'primer_apellido' => 'required',
            'fecha' => 'required',
            'lugarnac' => 'required',
            'nacionalidad' => 'required',
            'sexo' => 'required',
            'celular' => 'required',
            'parentesco' => 'required',
            'estados_id' => 'required',
            'ciudades_id' => 'required',
            'municipios_id' => 'required',
            'parroquias_id' => 'required',
            'urbanizacion' => 'required',
            'tzona' => 'required',
            'nzona' => 'required',
            'tcalle' => 'required',
            'ncalle' => 'required',
            'tvivienda' => 'required',
            'nvivienda' => 'required',
            'name' => 'required',
            'rol' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([

            'primer_nombre' => Str::upper($this->primer_nombre),
            'segundo_nombre' => Str::upper($this->segundo_nombre),
            'primer_apellido' => Str::upper($this->primer_apellido),
            'segundo_apellido' => Str::upper($this->segundo_apellido),
            'urbanizacion' => Str::upper($this->urbanizacion),
            'nacionalidad' => Str::upper($this->nacionalidad),
            'cedula' => Str::upper($this->cedula),
            'nzona' => Str::upper($this->nzona),
            'narea' => Str::upper($this->narea),
            'nhogar' => Str::upper($this->nhogar),
            'lugarnac' => Str::upper($this->lugarnac),
            'parentesco' => Str::upper($this->parentesco),
        ]);
    }

    public function messages()
    {
        return [
            'cedula.required' => 'La Cedula es requerida',
            'cedula.unique' => 'La Cedula ya existe',
            'celular.required' => 'El Celular es requerido',
            'email.required' => 'El Email es requerido',
            'email.unique' => 'El correo ya existe',
            'primer_nombre.required' => 'El Primer Nombre es requerido',
            'primer_apellido.required' => 'El Primer Apellido es requerido',
            'fecha.required' => 'La fecha es requerido',
            'lugarnac.required' => 'El lugar de nacimiento es requerido',
            'nacionalidad.required' => 'La nacionalidad es requerido',
            'sexo.required' => 'El sexo es requerido',
            'celular.required' => 'El celular es requerido',
            'parentesco.required' => 'El parentesco es requerido',
            'estados_id.required' => 'El estado es requerido',
            'ciudades_id.required' => 'La ciudad es requerido',
            'municipios_id.required' => 'El municipios es requerido',
            'parroquias_id.required' => 'La parroquias es requerido',
            'urbanizacion.required' => 'La urbanización es requerido',
            'tzona.required' => 'El zona es requerido',
            'nzona.required' => 'El nombre de la zona es requerido',
            'tcalle.required' => 'El area es requerido',
            'ncalle.required' => 'El nombre del area es requerido',
            'tvivienda.required' => 'El hogar es requerido',
            'nvivienda.required' => 'El nombre del hogar es requeridod',
            'name.required' => 'El name es requerido',
            'rol.required' => 'El rol es requerido',
            'password.required' => 'La password es requerido',
            'password_confirmation.required' => 'La confirmación es requerida',
        ];
    }
}
