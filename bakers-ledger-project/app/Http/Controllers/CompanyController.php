<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\District;
use App\Models\Legal;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('entries.companies.create', [
            'districts' => District::all(),
            'legals' => Legal::all(),
            'owners' => Owner::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'number' => 'required',
            'title' => 'required',
            'district_id' => 'required|numeric',
            'legal_id' => 'required|numeric',
            'since' => 'required|numeric',
            'phone' => 'required',
            'email' => 'required|email'
        ]);

        Company::create($validated);

        return redirect('/companies')->with('message', 'Предприятие успешно добавлено');
    }

    public function edit(Company $company)
    {
        return view('entries.companies.edit', [
            'company' => $company,
            'districts' => District::all(),
            'legals' => Legal::all(),
            'owners' => Owner::all()
        ]);
    }

    public function update(Request $request, Company $company)
    {
        $validated = $request->validate([
            'number' => 'required',
            'title' => 'required',
            'district_id' => 'required|numeric',
            'legal_id' => 'required|numeric',
            'since' => 'required|numeric',
            'phone' => 'required',
            'email' => 'required|email'
        ]);

        $company->update($validated);

        return redirect('/companies')->with('message', 'Предприятие успешно изменено');
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return redirect('/companies')->with('message', 'Предприятие успешно удалено');
    }
}
