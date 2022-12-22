<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        return view('entries.grades.index', [
            'grades' => Grade::latest()->orderBy('id', 'desc')->paginate(40)
        ]);
    }

    public function show(Grade $grade)
    {
        return view('entries.grades.show', [
            'grade' => $grade
        ]);
    }

    public function create()
    {
        return view('entries.grades.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required'
        ]);

        Grade::create($validated);

        return redirect('/grades')->with('message', 'Сорт муки успешно добавлен');
    }

    public function edit(Grade $grade)
    {
        return view('entries.grades.edit', ['grade' => $grade]);
    }

    public function update(Request $request, Grade $grade)
    {
        $validated = $request->validate([
            'title' => 'required'
        ]);

        $grade->update($validated);

        return redirect('/grades')->with('message', 'Сорт муки успешно изменён');
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();

        return redirect('/grades')->with('message', 'Сорт муки успешно удалён');
    }
}
