<?php

namespace App\Http\Controllers;

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
        return view('entries.shops.create');
    }
}
