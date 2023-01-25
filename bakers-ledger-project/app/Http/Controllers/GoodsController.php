<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Goods;
use App\Models\Trademark;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function index()
    {
        return view('entries.goods.index', [
            'goods' => Goods::latest()->orderBy('id', 'desc')->paginate(40)
        ]);
    }

    public function show(Goods $goods_instance)
    {
        return view('entries.goods.show', [
            'goods_instance' => $goods_instance
        ]);
    }

    public function create()
    {
        $this->authorize('create', Goods::class);

        return view('entries.goods.create', [
            'deliveries' => Delivery::all(),
            'trademarks' => Trademark::all(),
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Goods::class);

        $validated = $request->validate([
            'user_id' => '',
            'delivery_id' => 'required',
            'trademark_id' => 'required',
            'quantity' => 'required|integer',
        ]);

        Goods::create($validated);

        return redirect('/goods')->with('message', 'Товар успешно добавлен');
    }

    public function edit(Goods $goods_instance)
    {
        $this->authorize('update', $goods_instance);

        return view('entries.goods.edit', [
            'goods_instance' => $goods_instance,
            'deliveries' => Delivery::all(),
            'trademarks' => Trademark::all()
        ]);
    }

    public function update(Request $request, Goods $goods_instance)
    {
        $this->authorize('update', $goods_instance);

        $validated = $request->validate([
            'delivery_id' => 'required',
            'trademark_id' => 'required',
            'quantity' => 'required|integer',
        ]);

        $goods_instance->update($validated);

        return redirect('/goods')->with('message', 'Товар успешно изменён');
    }

    public function destroy(Goods $goods_instance)
    {
        $goods_instance->delete();

        return redirect('/goods')->with('message', 'Товар успешно удалён');
    }
}
