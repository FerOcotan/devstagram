<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class PostController extends Controller
{   
    use AuthorizesRequests; // 🔹 Agregar esto

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }



    public function index(User $user)
    {
      
        $posts = Post::where('user_id', $user->id)->latest()->paginate(10);


     return view('layouts.dashboard',
     ['user' => $user,  
     'posts' => $posts
     ]);
    }

    public function create(User $user)
    {

       

        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);

        Post::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => FacadesAuth::id()
        ]);

       


        return redirect()->route('post.index', FacadesAuth::user()->username);
    }


    public function show(User $user, Post $post)
    {
        return view('posts.show', ['post' => $post, 'user' => $user]);
    }

    public function destroy(Post $post)
    {
      $this->authorize('delete', $post);
        $image_path = public_path('uploads/' . $post->imagen);
        $post->delete();

        //Eliminar imagen
        if(File::exists($image_path)){
            unlink($image_path);
            
        }
        return redirect()->route('post.index', FacadesAuth::user()->username);

    }


    public function likes()
    {
        return $this->hasMany(Like::class);
    }



}
