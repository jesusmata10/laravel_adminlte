<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    use HasFactory;

    protected $table = 'personas';

    protected $fillable = [
        'cedula',
        'rif',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'fecha',
        'telefono',
        'celular',
        'email',
        'lugarnac',
        'nacionalidad',
        'sexo',
        'status',
        'user_id',
        'user_create',
        'parentesco',
        'vocero_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $with = [
        'direccion'
    ];

    public function direccion()
    {
        return $this->hasOne(Direccion::class);
    }
}
