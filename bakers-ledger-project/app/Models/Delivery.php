<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = ['shop_id', 'trademark_id', 'price', 'quantity', 'date'];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function trademark()
    {
        return $this->belongsTo(Trademark::class);
    }
}
