<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

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
        'username' => 'required|unique:users,username|min:4|max:20',
        'email' => 'required|unique:users,email|email|max:30|min:10',
        'password' => 'required|confirmed|min:8|max:20',
    ]);


    User::create([
        'name' => $request->name,
        'username' => Str::slug($request->username),
        'email' => $request->email,
        
        'password' => Hash::make($request->password),
    ]);
    Auth::attempt($request->only('email', 'password'));
    return redirect()->route('post.index', Auth::user()->username);
    }


}
