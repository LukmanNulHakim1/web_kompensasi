<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Labor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'location', 'capacity', 'photo', 'description', 'facilities'];

    // Cast facilities ke array
    protected $casts = [
        'facilities' => 'array',
    ];
}
