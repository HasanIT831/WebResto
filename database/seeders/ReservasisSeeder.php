<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservasisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('reservasis')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        DB::table('reservasis')->insert([
            'nama'         => 'Budi Santoso',
            'no_tlpn'      => '08111111111',
            'waktu'        => '18:00:00',
            'jumlah_orang' => 10,
            'tanggal'      => '2026-03-05',
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('reservasis')->insert([
            'nama'         => 'Siti Rahayu',
            'no_tlpn'      => '08122222222',
            'waktu'        => '19:00:00',
            'jumlah_orang' => 15,
            'tanggal'      => '2026-03-06',
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('reservasis')->insert([
            'nama'         => 'Ahmad Fauzi',
            'no_tlpn'      => '08133333333',
            'waktu'        => '17:30:00',
            'jumlah_orang' => 20,
            'tanggal'      => '2026-03-07',
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('reservasis')->insert([
            'nama'         => 'Dewi Lestari',
            'no_tlpn'      => '08144444444',
            'waktu'        => '18:30:00',
            'jumlah_orang' => 25,
            'tanggal'      => '2026-03-08',
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('reservasis')->insert([
            'nama'         => 'Rendi Pratama',
            'no_tlpn'      => '08155555555',
            'waktu'        => '19:30:00',
            'jumlah_orang' => 30,
            'tanggal'      => '2026-03-09',
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('reservasis')->insert([
            'nama'         => 'Rina Wulandari',
            'no_tlpn'      => '08166666666',
            'waktu'        => '12:00:00',
            'jumlah_orang' => 12,
            'tanggal'      => '2026-03-10',
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('reservasis')->insert([
            'nama'         => 'Hendra Gunawan',
            'no_tlpn'      => '08177777777',
            'waktu'        => '13:00:00',
            'jumlah_orang' => 18,
            'tanggal'      => '2026-03-11',
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('reservasis')->insert([
            'nama'         => 'Maya Anggraini',
            'no_tlpn'      => '08188888888',
            'waktu'        => '20:00:00',
            'jumlah_orang' => 8,
            'tanggal'      => '2026-03-12',
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('reservasis')->insert([
            'nama'         => 'Doni Saputra',
            'no_tlpn'      => '08199999999',
            'waktu'        => '11:00:00',
            'jumlah_orang' => 50,
            'tanggal'      => '2026-03-13',
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('reservasis')->insert([
            'nama'         => 'Fitri Handayani',
            'no_tlpn'      => '08210000001',
            'waktu'        => '12:30:00',
            'jumlah_orang' => 35,
            'tanggal'      => '2026-03-14',
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('reservasis')->insert([
            'nama'         => 'Wahyu Nugroho',
            'no_tlpn'      => '08210000002',
            'waktu'        => '19:00:00',
            'jumlah_orang' => 20,
            'tanggal'      => '2026-03-15',
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('reservasis')->insert([
            'nama'         => 'Sari Dewi',
            'no_tlpn'      => '08210000003',
            'waktu'        => '17:00:00',
            'jumlah_orang' => 45,
            'tanggal'      => '2026-03-16',
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('reservasis')->insert([
            'nama'         => 'Bagas Prasetyo',
            'no_tlpn'      => '08210000004',
            'waktu'        => '18:00:00',
            'jumlah_orang' => 60,
            'tanggal'      => '2026-03-17',
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('reservasis')->insert([
            'nama'         => 'Lina Kusuma',
            'no_tlpn'      => '08210000005',
            'waktu'        => '20:00:00',
            'jumlah_orang' => 15,
            'tanggal'      => '2026-03-18',
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('reservasis')->insert([
            'nama'         => 'Rizky Aditya',
            'no_tlpn'      => '08210000006',
            'waktu'        => '11:30:00',
            'jumlah_orang' => 25,
            'tanggal'      => '2026-03-19',
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('reservasis')->insert([
            'nama'         => 'Nisa Ramadhani',
            'no_tlpn'      => '08210000007',
            'waktu'        => '13:00:00',
            'jumlah_orang' => 40,
            'tanggal'      => '2026-03-20',
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('reservasis')->insert([
            'nama'         => 'Fajar Siddiq',
            'no_tlpn'      => '08210000008',
            'waktu'        => '18:30:00',
            'jumlah_orang' => 30,
            'tanggal'      => '2026-03-21',
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('reservasis')->insert([
            'nama'         => 'Desi Purnama',
            'no_tlpn'      => '08210000009',
            'waktu'        => '19:30:00',
            'jumlah_orang' => 55,
            'tanggal'      => '2026-03-22',
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('reservasis')->insert([
            'nama'         => 'Andi Kurniawan',
            'no_tlpn'      => '08210000010',
            'waktu'        => '20:30:00',
            'jumlah_orang' => 70,
            'tanggal'      => '2026-03-23',
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        DB::table('reservasis')->insert([
            'nama'         => 'Yeni Marlina',
            'no_tlpn'      => '08210000011',
            'waktu'        => '12:00:00',
            'jumlah_orang' => 22,
            'tanggal'      => '2026-03-24',
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);
    }
}
