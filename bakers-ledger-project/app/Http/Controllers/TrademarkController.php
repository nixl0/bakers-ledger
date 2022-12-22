<?php

namespace App\Http\Controllers;

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
        return view('entries.trademarks.create');
    }
}
