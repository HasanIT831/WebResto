<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('admin')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        \App\Models\User::create([
            'Username' => 'admin',
            'Level' => 'Admin',
            'Nama' => 'Yudi',
            'Alamat' => 'Sidoarjo',
            'Email' => 'yudi@gmail.com',
            'No_Tlpn' => '08123456789',
            'password' => Hash::make('admin'),
        ]);      
    }
}