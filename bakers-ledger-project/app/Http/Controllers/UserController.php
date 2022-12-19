<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('entries.users.index', [
            'users' => User::latest()->orderBy('id', 'desc')->paginate(40)
        ]);
    }

    public function show(User $user)
    {
        return view('entries.users.show', [
            'user' => $user
        ]);
    }
}
