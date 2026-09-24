<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaguController extends Controller
{
    public function Create(Request $request){
        $valid = $request->validate([
            'judul'=>'required|string|min:3',
            'deskripsi'=> 'string|min:5',
            'lirik'=> 'string|min:3',
            'tanggal_terbit'=> 'date:YYYY-MM-DD|before_or_equal:today'
        ]);

        
    }
}
