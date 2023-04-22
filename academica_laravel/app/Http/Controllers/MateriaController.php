<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index()
    {
        return materia::get();
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        Materia::create($request->all());
        return response()->json(['msg'=>'ok'], 200);
    }

    public function show(Materia $materia)
    {
        return $materia;
    }

    public function edit()
    {

    }

    public function update(Request $request, Materia $materia)
    {
        $materia:: where ('idMateria', $request['idMateria']) -> update([
            'codigo' => $request['codigo'],
            'nombre' => $request['nombre'],
        ]);
        return response() -> json(['msg' => 'ok'], 200);
    }

    public function destroy(Materia $materia, Request $request)
    {
        $materia :: where ('idMateria', $request['idMateria']) -> delete();
        return response() -> json(['msg' => 'ok'], 200);
    }
}
