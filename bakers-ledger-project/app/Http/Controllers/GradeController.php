<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        return view('entries.grades.index', [
            'grades' => Grade::latest()->paginate(40)
        ]);
    }
}
