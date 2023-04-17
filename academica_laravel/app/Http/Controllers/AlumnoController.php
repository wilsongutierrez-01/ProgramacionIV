<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()//GET
    {
        //select * from alumnos;
        return alumno::get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)//POST
    {
        //insert into alumnos...
        Alumno::create($request->all());
        return response()->json(['msg'=>'ok'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)//GET
    {
        //seelct * from alumno where idAlumno=?
        return $alumno;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno)//PUT
    {
        //update alumnos set ? where id=?
        $alumno->update($request->all(), $request->all());
        return response()->json(['msg'=>'ok'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)//DELETE
    {
        //delete alumnos from alumnos where id=?
        $alumno->delete();
        return response()->json(['msg'=>'ok'], 200);
    }
}
