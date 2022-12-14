<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    protected $table = 'paises';

    protected $fillable = [
        'codigo',
        'pais',
        'status'
    ];

    protected $hidden = [

        'created_at',
        'updated_at',

    ];

    protected $attributes = [
        'status' => true
    ];
}
