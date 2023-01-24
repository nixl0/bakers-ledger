<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyOwner;
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
        $this->authorize('operate', Company::class);

        return view('entries.companies.create', [
            'districts' => District::all(),
            'legals' => Legal::all(),
            'owners' => Owner::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('operate', Company::class);


        $validated = $request->validate([
            'number' => 'required',
            'title' => 'required',
            'district_id' => 'required|numeric',
            'legal_id' => 'required|numeric',
            'since' => 'required|numeric',
            'phone' => 'required',
            'email' => 'required|email'
        ]);

        $company = Company::create($validated);

        $owners = explode(',', $request['owner_id']);
        $company->owners()->attach($owners);

        return redirect('/companies')->with('message', 'Предприятие успешно добавлено');
    }

    public function edit(Company $company)
    {
        $this->authorize('operate', Company::class);

        return view('entries.companies.edit', [
            'company' => $company,
            'districts' => District::all(),
            'legals' => Legal::all(),
            'owners' => Owner::all()
        ]);
    }

    public function update(Request $request, Company $company)
    {
        $this->authorize('operate', Company::class);

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

        $owners = explode(',', $request['owner_id']);
        $company->owners()->detach();
        $company->owners()->attach($owners);

        return redirect('/companies')->with('message', 'Предприятие успешно изменено');
    }

    public function destroy(Company $company)
    {
        $this->authorize('operate', Company::class);

        $company->delete();

        return redirect('/companies')->with('message', 'Предприятие успешно удалено');
    }
}
