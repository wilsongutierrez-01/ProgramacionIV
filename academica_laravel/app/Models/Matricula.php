<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    // protected $table = 'matriculas';
    // protected $primaryKey = 'idMatricula';
    protected $fillable = ['fecha', 'pago', 'comprobante', 'alumno_nombre', 'alumno_id'];
}
