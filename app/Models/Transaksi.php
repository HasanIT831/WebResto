<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';

    protected $fillable = [
        'reservasi_id',
        'setmenu_id',
        'status',
        'total'
    ];

    // Relasi ke Reservasi
    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class, 'reservasi_id');
    }

    // Relasi ke SetMenu
    public function setmenu()
    {
        return $this->belongsTo(SetMenu::class, 'setmenu_id');
    }
}