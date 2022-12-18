<?php

namespace App\Http\Controllers;

use App\Models\Settlement;
use Illuminate\Http\Request;

class SettlementController extends Controller
{
    public function index()
    {
        return view('entries.settlements.index', [
            'settlements' => Settlement::latest()->paginate(40)
        ]);
    }
}
