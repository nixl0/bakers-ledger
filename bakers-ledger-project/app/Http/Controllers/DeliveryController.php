<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index()
    {
        return view('entries.deliveries.index', [
            'deliveries' => Delivery::latest()->paginate(40)
        ]);
    }
}
