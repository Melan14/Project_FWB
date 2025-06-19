<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Favorites extends Pivot
{
  public function spot()
{
    return $this->belongsTo(SpotKuliner::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}
}
