<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function trademarks()
    {
        return $this->hasMany(Trademark::class);
    }
}
