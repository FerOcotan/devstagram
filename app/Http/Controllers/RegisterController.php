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
        'name' => 'required|min:4|max:30',
        'username' => 'required|unique:users|table:users|min:4|max:20',
        'email' => 'required|unique:users|email|max:30|min:10',
        'password' => 'required|min:8',
    ]);

    }

}
