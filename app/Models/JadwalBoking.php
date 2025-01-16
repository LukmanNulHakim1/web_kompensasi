<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Labor;
use App\Models\SlotWaktu;


class JadwalBoking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'labor_id',
        'slot_waktu_id',
        'date',
        'status',
    ];

    /**
     * Relasi dengan User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi dengan Labor
     */
    public function labor()
    {
        return $this->belongsTo(Labor::class);
    }

    /**
     * Relasi dengan SlotWaktu
     */
    public function slotWaktu()
    {
        return $this->belongsTo(SlotWaktu::class);
    }
}
