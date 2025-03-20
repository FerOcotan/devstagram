<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index(User $user)
    {
      
     return view('layouts.dashboard',['user' => $user]);
    }

    public function create()
    {


        return view('posts.create');
    }
}
