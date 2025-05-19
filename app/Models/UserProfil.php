<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfil extends Model
{
    protected $fillable = [
        'user_id', 'foto', 'bio', 'deskripsi',
    ];

    public function user()
    {
        return $this->belongsTo(Users::class);
    }
}
