<?php

namespace App\Http\Controllers;

use App\Models\Legal;
use Illuminate\Http\Request;

class LegalController extends Controller
{
    public function index()
    {
        return view('entries.legals.index', [
            'legals' => Legal::latest()->paginate(40)
        ]);
    }
}
