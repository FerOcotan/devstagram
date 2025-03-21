<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        $imagen = $request->file('file');

        $nombreImagen = Str::uuid() . '.' . $imagen->extension();

        $imagenServidor =  Image::make($imagen);
        $imagenServidor->fit(1000,1000);
        $imagenPath = public_path('uploads/' . '/'. $nombreImagen);
        $imagenServidor->save($imagenPath);


        return response()->json(['imagen' => $nombreImagen]);
    }
}
