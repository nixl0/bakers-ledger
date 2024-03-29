<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'first_name',
        'patronym',
        'email',
        'password',
    ];

    public const IS_READER = 1;
    public const IS_ADMIN = 2;
    public const IS_MANAGER = 3;
    public const IS_EDITOR = 4;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

    public function trademarks()
    {
        return $this->hasMany(Trademark::class);
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }

    public function goods()
    {
        return $this->hasMany(Goods::class);
    }
}
