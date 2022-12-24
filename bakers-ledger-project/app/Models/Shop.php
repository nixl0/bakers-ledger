<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'title', 'district_id', 'address', 'phone'];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }
}
