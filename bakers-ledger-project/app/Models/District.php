<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    public function settlement()
    {
        return $this->belongsTo(Settlement::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }
}
