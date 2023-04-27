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
        Inscripcion::create($request->all());
        return response()->json(['msg'=>'ok'], 200);
    }

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
            'codigo' => $request['codigo'],
            'nombre' => $request['nombre'],
        ]);
        return response() -> json(['msg' => 'ok'], 200);
    }

    public function destroy(Inscripcion $docente, Request $request)
    {
        $docente :: where ('idInscripcion', $request['idInscripcion']) -> delete();
        return response() -> json(['msg' => 'ok'], 200);
    }
}
