<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class lagu_album extends Model
{
    public function lagu():HasMany{
        return $this->hasMany(lagu::class, 'lagu_id');
    }
    public function lagu_album():HasMany{
        return $this->hasMany(lagu_album::class, 'album_id');
    }
}
