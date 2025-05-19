<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpotKuliner extends Model
{
    protected $fillable = [
        'user_id', 'nama', 'deskripsi', 'lokasi', 'status',
    ];

    public function vendor()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'spot_id');
    }

    public function favoriters()
    {
        return $this->belongsToMany(Users::class, 'favorites', 'spot_id', 'user_id')
                    ->withTimestamps();
    }
}
