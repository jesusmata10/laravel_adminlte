<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    protected $table = 'direcciones';

    protected $fillable = [
        'personas_id',
        'estados_id',
        'municipios_id',
        'ciudades_id',
        'parroquia_id',
        'urbanizacion',
        'zonas_id',
        'nzona',
        'areas_id',
        'narea',
        'hogares_id',
        'nhogar',
        'status'
    ];
}
