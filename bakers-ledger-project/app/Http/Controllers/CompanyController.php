<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return view('entries.companies.index', [
            'companies' => Company::latest()->paginate(40)
        ]);
    }
}
