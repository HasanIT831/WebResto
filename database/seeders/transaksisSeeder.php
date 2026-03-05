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

        $setmenus = DB::table('setmenu')->get();

        for ($i = 1; $i <= 100; $i++) {
            $setmenu = $setmenus->random();
            DB::table('transaksis')->insert([
                'reservasi_id' => $i,
                'setmenu_id'   => $setmenu->id,
                'status'       => fake()->randomElement(['proses', 'selesai', 'batal']),
                'total'        => $setmenu->Harga,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        }

    }
}