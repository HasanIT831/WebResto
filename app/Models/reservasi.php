<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $table = 'reservasis';

    protected $fillable = [
        'nama',
        'no_tlpn',
        'waktu',
        'jumlah_orang',
        'tanggal'
    ];
}