<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lagu extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'lirik',
        'tanggal_terbit'
    ];

    public function lagu_album(){
        return $this->belongsToMany(lagu_album::class);
    }
}
