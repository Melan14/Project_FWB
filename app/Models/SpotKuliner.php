<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpotKuliner extends Model
{
    protected $fillable = [
        'user_id', 'nama', 'deskripsi', 'lokasi', 'status', 'gambar',
    ];

    public function vendor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'spot_id');
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites', 'spot_id', 'user_id')
                    ->withTimestamps();
    }
    public function user()
{
    return $this->belongsTo(user::class);
}

}
