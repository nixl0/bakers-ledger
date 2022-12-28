<?php

namespace App\Http\Controllers;

use App\Models\Settlement;
use Illuminate\Http\Request;

class SettlementController extends Controller
{
    public function index()
    {
        return view('entries.settlements.index', [
            'settlements' => Settlement::latest()->orderBy('id', 'desc')->paginate(40)
        ]);
    }

    public function show(Settlement $settlement)
    {
        return view('entries.settlements.show', [
            'settlement' => $settlement
        ]);
    }

    public function create()
    {
        $this->authorize('operate', Settlement::class);

        return view('entries.settlements.create');
    }

    public function store(Request $request)
    {
        $this->authorize('operate', Settlement::class);

        $validated = $request->validate([
            'user_id' => '',
            'title' => 'required'
        ]);

        Settlement::create($validated);

        return redirect('/settlements')->with('message', 'Город успешно добавлен');
    }

    public function edit(Settlement $settlement)
    {
        $this->authorize('operate', Settlement::class);

        return view('entries.settlements.edit', ['settlement' => $settlement]);
    }

    public function update(Request $request, Settlement $settlement)
    {
        $this->authorize('operate', Settlement::class);

        $validated = $request->validate([
            'title' => 'required'
        ]);

        $settlement->update($validated);

        return redirect('/settlements')->with('message', 'Город успешно изменён');
    }

    public function destroy(Settlement $settlement)
    {
        $this->authorize('operate', Settlement::class);

        $settlement->delete();

        return redirect('/settlements')->with('message', 'Город успешно удалён');
    }
}
