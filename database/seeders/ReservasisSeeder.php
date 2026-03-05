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

        for ($i = 0; $i < 100; $i++) {
            DB::table('reservasis')->insert([
                'nama'         => fake()->name(),
                'no_tlpn'      => fake()->numerify('08##########'),
                'waktu'        => fake()->time('H:i'),
                'jumlah_orang' => fake()->numberBetween(1, 20),
                'tanggal'      => fake()->dateTimeBetween('-1 month', '+1 month')->format('Y-m-d'),
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        }

    }
}