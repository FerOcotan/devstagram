<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('perfil.index');
    }   

    public function store( Request $request)
    {
        $nombreImagen = null;
        $request->request->add(['username' =>Str::slug($request->username)]);
        
        $request->validate([
            'username' => 'required|unique:users,username,' . Auth::user()->id . '|min:4|max:20|not_in:twiter,root,admin,editar-perfil',
        ]);

        if($request -> imagen){
            $imagen = $request->file('imagen');

            $nombreImagen = Str::uuid() . '.' . $imagen->extension();
    
            $imagenServidor =  Image::make($imagen);
            $imagenServidor->fit(1000,1000);
            $imagenPath = public_path('perfiles/' . '/'. $nombreImagen);
            $imagenServidor->save($imagenPath);
        }

        $usuario = User::find(Auth::user()->id);
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? Auth::user()->imagen ??  null ;

        $usuario->save(); 
        
        return redirect()->route('post.index', $usuario->username);
    }
}
