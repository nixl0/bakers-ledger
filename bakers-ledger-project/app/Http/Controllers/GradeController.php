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
}
