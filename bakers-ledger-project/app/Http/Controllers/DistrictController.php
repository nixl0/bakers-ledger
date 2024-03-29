<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Settlement;
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

    public function create()
    {
        $this->authorize('operate', District::class);

        return view('entries.districts.create', [
            'settlements' => Settlement::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('operate', District::class);

        $validated = $request->validate([
            'title' => 'required',
            'settlement_id' => 'required'
        ]);

        District::create($validated);

        return redirect('/districts')->with('message', 'Район успешно добавлен');
    }

    public function edit(District $district)
    {
        $this->authorize('operate', District::class);

        return view('entries.districts.edit', [
            'district' => $district,
            'settlements' => Settlement::all()
        ]);
    }

    public function update(Request $request, District $district)
    {
        $this->authorize('operate', District::class);

        $validated = $request->validate([
            'title' => 'required',
            'settlement_id' => 'required'
        ]);

        $district->update($validated);

        return redirect('/districts')->with('message', 'Район успешно изменён');
    }

    public function destroy(District $district)
    {
        $this->authorize('operate', District::class);

        $district->delete();

        return redirect('/districts')->with('message', 'Район успешно удалён');
    }
}
