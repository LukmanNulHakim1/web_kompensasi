<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = ['user_id', 'labor_id', 'description'];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke model Labor
    public function labor()
    {
        return $this->belongsTo(Labor::class);
    }
}
