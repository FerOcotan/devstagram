<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth as FacadesAuth;


class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }



    public function index(User $user)
    {
      
     $posts = Post::where('user_id', $user->id)->paginate(20);

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
        return view('posts.show', ['post' => $post]);
    }




}
