<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matricula;
use Intervention\Image\ImageManagerStatic as Image;


class MatriculaController extends Controller
{
    public function guardarMatricula(Request $request) {
        $matricula = new Matricula($request->all());
        $matricula->save();
        return response()->json($matricula, 201);
    }


  //  public function store(Request $request)
//{

//     $directory = 'comprobantes';
// $file = $request->file('comprobante');
// $fileName = $file->getClientOriginalName();
// $storedPath = $file->storeAs($directory, $fileName, 'public');
// $storedPath = str_replace('public', 'storage', $storedPath);
// $filePath = storage_path('app/' . $storedPath);
// $finfo = finfo_open(FILEINFO_MIME_TYPE);
// $mimeType = finfo_file($finfo, $filePath);
// finfo_close($finfo);
// $path = Storage::url($storedPath);
// $matricula = new Matricula([
//     'idMatricula' => $request->input('idMatricula'),
//     'fecha' => $request->input('fecha'),
//     'pago' => $request->input('pago'),
//     'comprobante' => $path,
//     'idAlumno' => $request->input('idAlumno'),
// ]);
// $matricula->save();
    // $matricula = new Matricula;
    // $matricula->idMatricula = $request->input('idMatricula');
    // $matricula->fecha = $request->input('fecha');
    // $matricula->pago = $request->input('pago');

    // $imageData = $request->input('comprobante');
    // $extension = explode('/', mime_content_type('jpg'))[1];
    // $fileName = uniqid().'.'.$extension;
    // $path = public_path('comprobantes'); // Ruta relativa al directorio public del proyecto
    // $fullPath = $path.'/'.$fileName;

    // if (!is_dir($path)) {
    //     mkdir($path, 0777, true);
    // }

    // $image = Image::make($imageData);
    // $image->save($fullPath);

    // $matricula->comprobante = $fullPath;
    // $matricula->alumno_id = $request->input('alumno.id');

    // $matricula->save();

    // return response()->json([
    //     'message' => 'Matricula guardada exitosamente'
    // ]);
//}



    public function store(Request $request)
    {
        $matricula = new Matricula();
        $matricula->idMatricula = $request->input('idMatricula');
        $matricula->fecha = $request->input('fecha');
        $matricula->pago = $request->input('pago') ? true : false;
        $matricula->alumno_nombre = $request->input('alumno.label');
        $matricula->alumno_id = $request->input('alumno.id');

        if ($request->hasFile('comprobante')) {
            $file = $request->file('comprobante');
            $path = $file->store(public_path('comprobantes'));

            // $path = $file->store('comprobantes'); // Guardamos la imagen en el directorio "comprobantes" dentro de la carpeta "storage/app/public"
            $matricula->comprobante = $path;
        }

        $matricula->save();

        return response()->json(['message' => 'Matricula creada correctamente', 'matricula' => $matricula]);
    }

    public function update(Request $request, Matricula $matricula)
    {
        $matricula:: where ('idMatricula', $request['idMatricula']) -> update([
            'fecha' => $request['fecha'],
            'pago' => $request['pago'],
            'alumno_nombre' => $request['alumno.label'],
            'alumno_id' => $request['alumno.id'],
        ]);
        return response() -> json(['msg' => 'ok'], 200);
    }

    public function destroy(Matricula $matricula, Request $request)
    {
        $matricula :: where ('idMatricula', $request['idMatricula']) -> delete();
        return response() -> json(['msg' => 'ok'], 200);
    }
}
