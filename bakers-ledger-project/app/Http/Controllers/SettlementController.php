<?php

namespace App\Http\Controllers;

use App\Models\Settlement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class SettlementController extends Controller
{
    public function index() {
        $columns = Schema::getColumnListing('settlements');

        return view('entities.settlements.index', [
            'columns' => $columns,
            'settlements' => Settlement::latest()->paginate(20)
        ]);
    }
}
