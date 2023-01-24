<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Legal extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
