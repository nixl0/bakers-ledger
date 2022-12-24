<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trademark extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'company_id', 'grade_id', 'ingredients', 'weight'];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }
}
