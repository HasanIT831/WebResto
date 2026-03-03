<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetMenu extends Model
{
    use HasFactory;

    // Sesuaikan dengan tabel yang kamu buat
    protected $table = 'setmenu';

    protected $fillable = [
        'Nama',
        'Harga',
        'Makanan'
    ];
}