<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    // Relasi 1–1: user → profile
    public function profile()
    {
        return $this->hasOne(UserProfil::class);
    }

    // Relasi 1–M: vendor → spot
    public function spots()
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
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
    

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
