<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Favorites extends Pivot
{
  
    protected $fillable = [
        'user_id', 'spot_id',
    ];
}
