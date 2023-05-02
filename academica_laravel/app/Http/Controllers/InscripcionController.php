<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    public function index()
    {
        return inscripcion::get();
    }

    public function create()
    {

    }

public function store(Request $request)
{
    $inscripcion = new Inscripcion;
    $inscripcion->idInscripcion = $request->input('idInscripcion');
    $inscripcion->fecha = $request->input('fecha');
    $inscripcion->alumno_id = $request->input('alumno.id');
    $inscripcion->alumno_name = $request->input('alumno.label');
    $inscripcion->materia_id = $request->input('materia.id');
    $inscripcion->materia_name = $request->input('materia.label');
    $inscripcion->save();
    return response()->json(['message' => 'Inscripción creada exitosamente'], 201);

    // Inscripcion::create($request->all());
    // return response()->json(['msg'=>'ok'], 200);
}

    // public function store(Request $request)
    // {
    //     Inscripcion::create($request->all());
    //     return response()->json(['msg'=>'ok'], 200);
    // }

    public function show(Inscripcion $docente)
    {
        return $docente;
    }

    public function edit()
    {

    }

    public function update(Request $request, Inscripcion $docente)
    {
        $docente:: where ('idInscripcion', $request['idInscripcion']) -> update([
            'fecha' => $request['fecha'],
            'alumno_id' => $request['alumno.id'],
            'alumno_name' => $request['alumno.label'],
            'materia_id' => $request['materia.id'],
            'materia_name' => $request['materia.label'],


        ]);
        return response() -> json(['msg' => 'ok'], 200);
    }

    public function destroy(Inscripcion $inscripcion, Request $request)
    {
        $inscripcion :: where ('idInscripcion', $request['idInscripcion']) -> delete();
        return response() -> json(['msg' => 'ok'], 200);
    }
}
