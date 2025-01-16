<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    public function index()
    {
        $pinjams = Pinjam::all(); // Ambil semua data pinjam
        return view('user.pinjam.index', compact('pinjams')); // Tampilkan ke view pinjam.index
    }


}
