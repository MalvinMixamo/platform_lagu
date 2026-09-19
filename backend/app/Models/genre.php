<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class genre extends Model
{
    protected $fillable = 'nama';

    public function lagu_genre(){
        return $this->belongsToMany(lagu_genre::class, 'genre_id');
    }
}
