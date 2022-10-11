<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('user-posts', [
            "title" => "User Posts",
            "name" => $user->name,
            "posts" => $user->posts
        ]);
    }
}
