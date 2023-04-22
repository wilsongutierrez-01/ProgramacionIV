<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;
    // protected $table = '';

    protected $fillable = [
        'idDocente',
        'codigo',
        'nombre',
        'apellido',
    ];
}
