<?php

namespace App\Http\Controllers;

use App\Models\Company;
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

    public function create()
    {
        return view('entries.users.create', [
            'companies' => Company::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:6',
            'last_name' => 'required',
            'first_name' => 'required',
            'patronym' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        User::create($validated);

        return redirect('/users')->with('message', 'Пользователь успешно добавлен');
    }

    public function edit(User $user)
    {
        return view('entries.users.edit', [
            'user' => $user,
            'companies' => Company::all()
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|min:6',
            'last_name' => 'required',
            'first_name' => 'required',
            'patronym' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $user->update($validated);

        return redirect('/users')->with('message', 'Пользователь успешно изменён');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/users')->with('message', 'Пользователь успешно удалён');
    }
}
