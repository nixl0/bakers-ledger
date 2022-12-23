<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'title', 'district_id', 'legal_id', 'since', 'phone', 'email'];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function legal()
    {
        return $this->belongsTo(Legal::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function trademarks()
    {
        return $this->hasMany(Trademark::class);
    }
}
