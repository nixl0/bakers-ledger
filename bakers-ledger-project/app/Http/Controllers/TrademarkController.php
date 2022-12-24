<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Grade;
use App\Models\Trademark;
use Illuminate\Http\Request;

class TrademarkController extends Controller
{
    public function index()
    {
        return view('entries.trademarks.index', [
            'trademarks' => Trademark::latest()->orderBy('id', 'desc')->paginate(40)
        ]);
    }

    public function show(Trademark $trademark)
    {
        return view('entries.trademarks.show', [
            'trademark' => $trademark
        ]);
    }

    public function create()
    {
        return view('entries.trademarks.create', [
            'companies' => Company::all(),
            'grades' => Grade::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'company_id' => 'required',
            'grade_id' => 'required',
            'ingredients' => 'required',
            'weight' => 'required|integer'
        ]);

        Trademark::create($validated);

        return redirect('/trademarks')->with('message', 'Торговая марка успешно добавлена');
    }

    public function edit(Trademark $trademark)
    {
        return view('entries.trademarks.edit', [
            'trademark' => $trademark,
            'companies' => Company::all(),
            'grades' => Grade::all()
        ]);
    }

    public function update(Request $request, Trademark $trademark)
    {
        $validated = $request->validate([
            'title' => 'required',
            'company_id' => 'required',
            'grade_id' => 'required',
            'ingredients' => 'required',
            'weight' => 'required|integer'
        ]);

        $trademark->update($validated);

        return redirect('/trademarks')->with('message', 'Торговая марка успешно изменена');
    }

    public function destroy(Trademark $trademark)
    {
        $trademark->delete();

        return redirect('/trademarks')->with('message', 'Торговая марка успешно удалена');
    }
}
