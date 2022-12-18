<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index()
    {
        return view('entries.districts.index', [
            'districts' => District::latest()->paginate(40)
        ]);
    }
}
