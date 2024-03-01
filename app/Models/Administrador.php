<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;

    public function users(){
        return $this->hasMany(User::class);
    }

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'imagen',
        'id_usuario',
    ];
}
