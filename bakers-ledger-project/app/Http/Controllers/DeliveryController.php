<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
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
        return view('entries.deliveries.create');
    }
}
