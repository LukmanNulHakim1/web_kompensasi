<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlotWaktu extends Model
{
    use HasFactory;

    protected $fillable = ['start_time', 'end_time', 'is_available'];
}
