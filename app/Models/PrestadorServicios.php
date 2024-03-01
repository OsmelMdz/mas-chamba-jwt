<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestadorServicios extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    protected $fillable = [
        'nombre',
        'imagen',
        'a_paterno',
        'a_materno',
        'fecha_nacimiento',
        'sexo',
        'telefono',
        'email',
        'status',
        'identificacion_personal',
        'comprovante_domicilio',
        'id_usuario',
        'id_cursos',
        'id_servicios',
        'id_certificaciones',
    ];
}
