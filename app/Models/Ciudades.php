<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudades extends Model
{
    use HasFactory;

    protected $table = 'ciudades';

    protected $fillable = [
        'id',
        'estados_id',
        'ciudad',
        'capital',
    ];

    protected $hidden = [

        'created_at',
        'updated_at',

    ];

    protected $attributes = [
        'status' => true
    ];
}
