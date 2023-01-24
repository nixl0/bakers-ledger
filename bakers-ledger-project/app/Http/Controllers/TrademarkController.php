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
        $this->authorize('operate', Trademark::class);

        return view('entries.trademarks.create', [
            'companies' => Company::all(),
            'grades' => Grade::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('operate', Trademark::class);

        $validated = $request->validate([
            'user_id' => '',
            'title' => 'required',
            'company_id' => 'required',
            'grade_id' => 'required',
            'ingredients' => 'required',
            'weight' => 'required|integer',
            'price' => 'required|numeric'
        ]);

        Trademark::create($validated);

        return redirect('/trademarks')->with('message', 'Торговая марка успешно добавлена');
    }

    public function edit(Trademark $trademark)
    {
        $this->authorize('operate', Trademark::class);

        return view('entries.trademarks.edit', [
            'trademark' => $trademark,
            'companies' => Company::all(),
            'grades' => Grade::all()
        ]);
    }

    public function update(Request $request, Trademark $trademark)
    {
        $this->authorize('operate', Trademark::class);

        $validated = $request->validate([
            'title' => 'required',
            'company_id' => 'required',
            'grade_id' => 'required',
            'ingredients' => 'required',
            'weight' => 'required|integer',
            'price' => 'required|numeric'
        ]);

        $trademark->update($validated);

        return redirect('/trademarks')->with('message', 'Торговая марка успешно изменена');
    }

    public function destroy(Trademark $trademark)
    {
        $this->authorize('operate', Trademark::class);

        $trademark->delete();

        return redirect('/trademarks')->with('message', 'Торговая марка успешно удалена');
    }
}
