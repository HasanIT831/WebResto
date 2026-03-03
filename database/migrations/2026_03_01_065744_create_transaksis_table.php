<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reservasi_id')
                  ->constrained('reservasis')
                  ->onDelete('cascade');

            $table->foreignId('setmenu_id')
                  ->constrained('setmenu')
                  ->onDelete('cascade');

            $table->enum('status', ['proses', 'selesai', 'batal'])
                  ->default('proses');

            $table->decimal('total', 15, 2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};