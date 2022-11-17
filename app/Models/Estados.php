<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    use HasFactory;

    protected $table = "estados";

    protected $fillable = [

        'estados',
        'iso_3166-2',
        'status',

    ];

    protected $hidden = [

        'created_at',
        'updated_at',

    ];

    protected $attributes = [
        'status' => true
    ];
}
