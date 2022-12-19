<?php

namespace App\Http\Controllers;

use App\Models\Legal;
use Illuminate\Http\Request;

class LegalController extends Controller
{
    public function index()
    {
        return view('entries.legals.index', [
            'legals' => Legal::latest()->orderBy('id', 'desc')->paginate(40)
        ]);
    }

    public function show(Legal $legal)
    {
        return view('entries.legals.show', [
            'legal' => $legal
        ]);
    }
}
