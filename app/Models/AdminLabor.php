<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiToken;

class AdminLabor extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guard = 'adminlabor';
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'labor_id',
        'admin_id',
    ];

    public function labor()
    {
        return $this->belongsTo(Labor::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
