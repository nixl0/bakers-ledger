<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index()
    {
        return view('entries.districts.index', [
            'districts' => District::latest()->orderBy('id', 'desc')->paginate(40)
        ]);
    }

    public function show(District $district)
    {
        return view('entries.districts.show', [
            'district' => $district
        ]);
    }
}
