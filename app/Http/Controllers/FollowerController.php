<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    public function store(User $user)
    {

        $user->followers()->attach(Auth::id());

        return back();
    }

    public function destroy(User $user)
    {
        $user->followers()->detach(Auth::id());

        return back();
    }
}
