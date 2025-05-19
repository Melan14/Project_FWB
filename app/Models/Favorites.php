<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Favorites extends Pivot
{
  
    protected $fillable = [
        'id_user', 'id_spot',
    ];
}
