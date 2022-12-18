<?php

namespace App\Http\Controllers;

use App\Models\Trademark;
use Illuminate\Http\Request;

class TrademarkController extends Controller
{
    public function index()
    {
        return view('entries.trademarks.index', [
            'trademarks' => Trademark::latest()->paginate(40)
        ]);
    }
}
