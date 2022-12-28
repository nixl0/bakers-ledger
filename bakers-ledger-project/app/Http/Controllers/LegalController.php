<?php

namespace App\Http\Controllers;

use App\Models\Legal;
use Illuminate\Http\Request;

class LegalController extends Controller
{
    public function index()
    {
        return view('entries.legals.index', [
            'legals' => Legal::latest()->orderBy('id', 'desc')->paginate(40)
        ]);
    }

    public function show(Legal $legal)
    {
        return view('entries.legals.show', [
            'legal' => $legal
        ]);
    }

    public function create()
    {
        $this->authorize('operate', Legal::class);

        return view('entries.legals.create');
    }

    public function store(Request $request)
    {
        $this->authorize('operate', Legal::class);

        $validated = $request->validate([
            'user_id' => '',
            'title' => 'required'
        ]);

        Legal::create($validated);

        return redirect('/legals')->with('message', 'Тип собственности успешно добавлен');
    }

    public function edit(Legal $legal)
    {
        $this->authorize('operate', Legal::class);

        return view('entries.legals.edit', ['legal' => $legal]);
    }

    public function update(Request $request, Legal $legal)
    {
        $this->authorize('operate', Legal::class);

        $validated = $request->validate([
            'title' => 'required'
        ]);

        $legal->update($validated);

        return redirect('/legals')->with('message', 'Тип собственности успешно изменён');
    }

    public function destroy(Legal $legal)
    {
        $this->authorize('operate', Legal::class);

        $legal->delete();

        return redirect('/legals')->with('message', 'Тип собственности успешно удалён');
    }
}
