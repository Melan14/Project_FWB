<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\UserProfil;
use App\Models\SpotKuliner;
use App\Models\Review;

class Users extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nama', 'email', 'password', 'role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Relasi 1–1: user → profile
    public function profil()
    {
        return $this->hasOne(UserProfil::class);
    }

    // Relasi 1–M: vendor → spot
    public function spot()
    {
        return $this->hasMany(SpotKuliner::class, 'user_id');
    }

    // Relasi 1–M: foodie → review
    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id');
    }

    // Relasi M–M: foodie → favorite spots
    public function favoriteSpots()
    {
        return $this->belongsToMany(SpotKuliner::class, 'favorites', 'user_id', 'spot_id')
                    ->withTimestamps();
    }
}
