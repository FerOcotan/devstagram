<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

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
        $request->validate([
            'username' => 'required|unique:users,username|min:4|max:20',

        ]);
        
    }
}
