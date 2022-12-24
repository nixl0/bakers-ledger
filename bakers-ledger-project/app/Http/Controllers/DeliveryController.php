<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Shop;
use App\Models\Trademark;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index()
    {
        return view('entries.deliveries.index', [
            'deliveries' => Delivery::latest()->orderBy('id', 'desc')->paginate(40)
        ]);
    }

    public function show(Delivery $delivery)
    {
        return view('entries.deliveries.show', [
            'delivery' => $delivery
        ]);
    }

    public function create()
    {
        return view('entries.deliveries.create', [
            'shops' => Shop::all(),
            'trademarks' => Trademark::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'shop_id' => 'required',
            'trademark_id' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'date' => 'required|date'
        ]);

        Delivery::create($validated);

        return redirect('/deliveries')->with('message', 'Поставка успешно добавлена');
    }

    public function edit(Delivery $delivery)
    {
        return view('entries.deliveries.edit', [
            'delivery' => $delivery,
            'shops' => Shop::all(),
            'trademarks' => Trademark::all()
        ]);
    }

    public function update(Request $request, Delivery $delivery)
    {
        $validated = $request->validate([
            'shop_id' => 'required',
            'trademark_id' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'date' => 'required|date'
        ]);

        $delivery->update($validated);

        return redirect('/deliveries')->with('message', 'Поставка успешно изменена');
    }

    public function destroy(Delivery $delivery)
    {
        $delivery->delete();

        return redirect('/deliveries')->with('message', 'Поставка успешно удалена');
    }
}
