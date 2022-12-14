<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $with = [
        'personas'
    ];

    public function personas()
    {
        return $this->hasOne(Personas::class)->orderBy('cedula', 'ASC');
    }

    public function scopeEmail($query, $email)
    {

        if ($email)
            return $query->where('email', 'LIKE', "%$email%");
    }

    public function scoperol($query, $rol)
    {

        if ($rol)
            return $query->where('rol', 'LIKE', "%$rol%");
    }

    public function scopeId($query, $id)
    {
        //dd($id);
        if ($id)
            return $query->where('id', 'LIKE', "$id");
    }

    public static function editar($id)
    {
        $data = User::with(['roles', 'personas'])->id($id)->first();
        return $data; //revisar consulta
    }
}
