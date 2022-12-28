<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        return view('entries.shops.index', [
            'shops' => Shop::latest()->orderBy('id', 'desc')->paginate(40)
        ]);
    }

    public function show(Shop $shop)
    {
        return view('entries.shops.show', [
            'shop' => $shop
        ]);
    }

    public function create()
    {
        $this->authorize('operate', Shop::class);

        return view('entries.shops.create', [
            'districts' => District::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('operate', Shop::class);

        $validated = $request->validate([
            'user_id' => '',
            'number' => 'required',
            'title' => 'required',
            'district_id' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);

        Shop::create($validated);

        return redirect('/shops')->with('message', 'Магазин успешно добавлен');
    }

    public function edit(Shop $shop)
    {
        $this->authorize('operate', Shop::class);

        return view('entries.shops.edit', [
            'shop' => $shop,
            'districts' => District::all()
        ]);
    }

    public function update(Request $request, Shop $shop)
    {
        $this->authorize('operate', Shop::class);

        $validated = $request->validate([
            'number' => 'required',
            'title' => 'required',
            'district_id' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);

        $shop->update($validated);

        return redirect('/shops')->with('message', 'Магазин успешно изменён');
    }

    public function destroy(Shop $shop)
    {
        $this->authorize('operate', Shop::class);

        $shop->delete();

        return redirect('/shops')->with('message', 'Магазин успешно удалён');
    }
}
