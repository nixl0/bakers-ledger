<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        return view('entries.owners.index', [
            'owners' => Owner::latest()->orderBy('id', 'desc')->paginate(40)
        ]);
    }

    public function show(Owner $owner)
    {
        return view('entries.owners.show', [
            'owner' => $owner
        ]);
    }

    public function create()
    {
        $this->authorize('operate', Owner::class);

        return view('entries.owners.create', [
            'companies' => Company::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('operate', Owner::class);

        $validated = $request->validate([
            'user_id' => '',
            'lastname' => 'required',
            'firstname' => 'required',
            'patronym' => 'required'
        ]);

        $owner = Owner::create($validated);

        $companies = explode(',', $request['company_id']);
        $owner->companies()->attach($companies);

        return redirect('/owners')->with('message', 'Владелец успешно добавлен');
    }

    public function edit(Owner $owner)
    {
        $this->authorize('operate', Owner::class);

        return view('entries.owners.edit', [
            'owner' => $owner,
            'companies' => Company::all()
        ]);
    }

    public function update(Request $request, Owner $owner)
    {
        $this->authorize('operate', Owner::class);

        $validated = $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'patronym' => 'required'
        ]);

        $owner->update($validated);

        return redirect('/owners')->with('message', 'Владелец успешно изменён');
    }

    public function destroy(Owner $owner)
    {
        $this->authorize('operate', Owner::class);

        $owner->delete();

        return redirect('/owners')->with('message', 'Владелец успешно удалён');
    }
}
