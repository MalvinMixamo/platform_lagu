<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lagu extends Model
{
    protected $table = 'lagu';
    protected $fillable = [
        'judul',
        'deskripsi',
        'lirik',
        'tanggal_terbit'
    ];

    public function lagu_album(){
        return $this->belongsToMany(lagu_album::class, 'lagu_id');
    }
    public function user_lagu(){
        return $this->belongsToMany(User::class, 'lagu_id');
    }
    public function lagu_genre(){
        return $this->belongsToMany(lagu_genre::class, 'lagu_id');
    }
}
