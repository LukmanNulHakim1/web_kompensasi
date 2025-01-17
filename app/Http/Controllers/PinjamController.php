<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;
use App\Models\Labor;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    
    public function show($id)
    {
        $labor = Labor::findOrFail($id); // Ambil data labor berdasarkan ID
        return view('user.pinjam.show', compact('labor')); // Pastikan 'pinjam.show' adalah view yang menampilkan detail
    }


}
