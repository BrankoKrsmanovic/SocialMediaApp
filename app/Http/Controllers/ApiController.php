<?php

namespace App\Http\Controllers;

use App\User;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function followUser(User $user)
    {
        return auth()->user()->following()->toggle($user->profile);
    }
}
