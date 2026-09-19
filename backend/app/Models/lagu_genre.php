<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lagu_genre extends Model
{
    public function lagu(){
        return $this->belongsToMany(lagu_genre::class, 'lagu_id');
    }
    public function genre(){
        return $this->belongsToMany(lagu_genre::class, 'genre_id');
    }
}
