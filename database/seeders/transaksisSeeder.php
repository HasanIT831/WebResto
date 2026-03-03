<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class transaksisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('transaksis')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        DB::table('transaksis')->insert([
            'reservasi_id' => 1,
            'setmenu_id'   => 1,
            'status'       => 'selesai',
            'total'        => 250000.00,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('transaksis')->insert([
            'reservasi_id' => 2,
            'setmenu_id'   => 2,
            'status'       => 'selesai',
            'total'        => 210000.00,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('transaksis')->insert([
            'reservasi_id' => 3,
            'setmenu_id'   => 3,
            'status'       => 'proses',
            'total'        => 200000.00,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('transaksis')->insert([
            'reservasi_id' => 4,
            'setmenu_id'   => 4,
            'status'       => 'selesai',
            'total'        => 300000.00,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('transaksis')->insert([
            'reservasi_id' => 5,
            'setmenu_id'   => 5,
            'status'       => 'proses',
            'total'        => 400000.00,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('transaksis')->insert([
            'reservasi_id' => 6,
            'setmenu_id'   => 6,
            'status'       => 'batal',
            'total'        => 430000.00,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('transaksis')->insert([
            'reservasi_id' => 7,
            'setmenu_id'   => 7,
            'status'       => 'selesai',
            'total'        => 480000.00,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('transaksis')->insert([
            'reservasi_id' => 8,
            'setmenu_id'   => 8,
            'status'       => 'proses',
            'total'        => 150000.00,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('transaksis')->insert([
            'reservasi_id' => 9,
            'setmenu_id'   => 9,
            'status'       => 'selesai',
            'total'        => 170000.00,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('transaksis')->insert([
            'reservasi_id' => 10,
            'setmenu_id'   => 1,
            'status'       => 'proses',
            'total'        => 250000.00,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('transaksis')->insert([
            'reservasi_id' => 11,
            'setmenu_id'   => 2,
            'status'       => 'selesai',
            'total'        => 210000.00,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('transaksis')->insert([
            'reservasi_id' => 12,
            'setmenu_id'   => 3,
            'status'       => 'proses',
            'total'        => 200000.00,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('transaksis')->insert([
            'reservasi_id' => 13,
            'setmenu_id'   => 4,
            'status'       => 'selesai',
            'total'        => 300000.00,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('transaksis')->insert([
            'reservasi_id' => 14,
            'setmenu_id'   => 5,
            'status'       => 'proses',
            'total'        => 400000.00,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('transaksis')->insert([
            'reservasi_id' => 15,
            'setmenu_id'   => 6,
            'status'       => 'selesai',
            'total'        => 430000.00,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('transaksis')->insert([
            'reservasi_id' => 16,
            'setmenu_id'   => 7,
            'status'       => 'proses',
            'total'        => 480000.00,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('transaksis')->insert([
            'reservasi_id' => 17,
            'setmenu_id'   => 8,
            'status'       => 'selesai',
            'total'        => 150000.00,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('transaksis')->insert([
            'reservasi_id' => 18,
            'setmenu_id'   => 9,
            'status'       => 'proses',
            'total'        => 170000.00,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('transaksis')->insert([
            'reservasi_id' => 19,
            'setmenu_id'   => 1,
            'status'       => 'selesai',
            'total'        => 250000.00,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('transaksis')->insert([
            'reservasi_id' => 20,
            'setmenu_id'   => 2,
            'status'       => 'proses',
            'total'        => 210000.00,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);
    }
}

