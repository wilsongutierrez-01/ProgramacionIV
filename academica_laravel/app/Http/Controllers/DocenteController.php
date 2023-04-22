<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index()
    {
        return docente::get();
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        Docente::create($request->all());
        return response()->json(['msg'=>'ok'], 200);
    }

    public function show(Docente $docente)
    {
        return $docente;
    }

    public function edit()
    {

    }

    public function update(Request $request, Docente $docente)
    {
        $docente -> update($request -> all(), $request -> all());
        return response() -> json(['msg' => 'ok'], 200);
    }

    public function destroy(Docente $docente)
    {
        $docente -> delete();
        return response() -> json(['msg' => 'ok'], 200);
    }
}
