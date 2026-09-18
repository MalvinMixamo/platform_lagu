<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class album extends Model
{
    protected $fillable = [
        'name'
    ];

    public function lagu_album(): HasMany{
        return $this->hasMany(lagu_album::class);
    }
}
