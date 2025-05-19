<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id', 'spot_id', 'rating', 'komentar',
    ];

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function spot()
    {
        return $this->belongsTo(SpotKuliner::class, 'spot_id');
    }
}
