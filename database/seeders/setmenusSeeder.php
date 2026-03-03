<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class setmenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('setmenu')->insert([
            'Nama' => 'Menu A',
            'Harga' => 250000.00,
            'Makanan' => "Ayam Goreng / Panggang
Gurami Bakar / Asam Manis
Sate Ayam / Cumi Goreng
Udang Tauco
Kangkung Terasi
Sayur Asam
Tahu Tempe Goreng
Nasi Putih
Buah-buahan",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

         DB::table('setmenu')->insert([
            'Nama' => 'Menu B',
            'Harga' => 210000.00,
            'Makanan' => "Ayam Goreng
Gurami Bakar
Gulai Kepala Ikan
Sate Ayam
Udang Saus Mentega
Tauge Ikan Asin
Tahu Tempe Goreng
Nasi Putih
Buah-buahan",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('setmenu')->insert([
            'Nama' => 'Menu C',
            'Harga' => 200000.00,
            'Makanan' => "Ayam Goreng
Gurami Bakar
Gulai Kepala Ikan
Kepiting
Kangkung Terasi
Sayur Asam
Nasi Putih
Buah-buahan",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('setmenu')->insert([
            'Nama' => 'Menu D',
            'Harga' => 300000.00,
            'Makanan' => "Ayam Goreng
Gurami Bakar
Gulai Kepala Ikan
Udang Galah
Kepiting
Sate Ayam
Kangkung Terasi
Nasi Putih
Buah-buahan",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('setmenu')->insert([
            'Nama' => 'Prasmanan A',
            'Harga' => 400000.00,
            'Makanan' => "Ayam Goreng / Panggang
Daging Ikan Asam Manis
Sate Ayam (2tsk/pax)
Sambel Kentang Teri
Tumis Tahu Cabe Ijo
Urap / Tempe Sambal Teri
Lalapan + Sambal Terasi
Kerupuk Udang
Nasi Putih
Buah-Buahan / Rujak Buah
Sunkist / Fruit Punch
Air Mineral Botol",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('setmenu')->insert([
            'Nama' => 'Prasmanan B',
            'Harga' => 430000.00,
            'Makanan' => "Ayam Goreng / Panggang
Udang Goreng Mentega
Kari Kambing / Dendeng Sapi
Ikan Kakap Gulai
Sate Ayam (2tsk/pax)
Sambel Kentang Teri
Urap / Tempe Sambal Teri
Lalapan + Sambal Terasi
Kerupuk Udang
Nasi Putih
Buah-Buahan / Rujak Buah
Kelapa Gelas / Timun Parut
Air Mineral Botol",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

         DB::table('setmenu')->insert([
            'Nama' => 'Prasmanan C',
            'Harga' => 480000.00,
            'Makanan' => "Ayam Goreng / Panggang
Ikan Kakap Gulai / Asam Manis
Udang Goreng Mentega
Kari Kambing / Dendeng Sapi
Sate Ayam (2tsk/pax)
Sambel Kentang Teri
Terong Sambal Balado
Urap / Tempe Sambal Teri
Lalapan + Sambal Terasi
Kerupuk Udang
Nasi Putih
Buah-Buahan / Rujak Kweni
Kelapa Gelas / Timun Parut
Air Mineral Botol",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

         DB::table('setmenu')->insert([
            'Nama' => 'Nasi Kotak A',
            'Harga' => 150000.00,
            'Makanan' => "Ayam Goreng / Panggang
Cap Cay Sayur
Tahu Tumis Udang Manis / 
Tauco Kacang Panjang
Sambal Teri + Tempe / 
Sambal Teri Pete
Lalapan
Kerupuk
Nasi Putih
Buah-Buahan",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('setmenu')->insert([
            'Nama' => 'Nasi Kotak B',
            'Harga' => 170000.00,
            'Makanan' => "Ayam Goreng / Panggang
Daging Ikan Asam Manis
Tahu Tumis Udang Manis / 
Tauco Kacang Panjang
Sambal Teri + Tempe / 
Sambal Teri Pete
Lalapan
Kerupuk
Nasi Putih
Buah-Buahan",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
