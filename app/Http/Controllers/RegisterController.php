<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
      
      //dd('Post...');

      //dd($request);
      $request->validate([
        'name' => 'required|min:4|max:255',
        'email' => 'required|email|max:255',
        'password' => 'required|min:8',
    ]);

    }

}
