<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function store(Request $request, User $user, Post $post){
        $request->validate([
            'comentario' => 'required'
        ]);
    
        Comentario::create([
            'user_id' => Auth::user()->id, // Se corrige el acceso al usuario autenticado
            'post_id' => $post->id, // Se corrige el acceso al ID del post
            'comentario' => $request->comentario
        ]);
    
        return back()->with('mensaje', 'Comentario agregado');
    }
}    
