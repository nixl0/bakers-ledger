<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return view('entries.companies.index', [
            'companies' => Company::latest()->orderBy('id', 'desc')->paginate(40)
        ]);
    }

    public function show(Company $company)
    {
        return view('entries.companies.show', [
            'company' => $company
        ]);
    }

    public function create()
    {
        return view('entries.companies.create');
    }
}
