<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Pinjam extends Model
{
    use HasFactory;

    // Menentukan nama tabel secara eksplisit
    protected $table = 'labors';
}
