<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logoutcontroller extends Controller
{
    public function store()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
