<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
    {
    use HasFactory;
    // protected $table = 'alumno';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'idAlumno',
        'codigo',
        'nombre',
        'direccion',
        'municipio',
        'departamento',
        'telefono',
        'fechaNacimiento',
        'sexo',
    ];
}
