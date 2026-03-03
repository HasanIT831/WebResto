<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Reservasi;
use App\Models\SetMenu;

class TransaksiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_transaksi' => 'required|date',
        ]);

        $reservasi = session('reservasi');
        $setmenu = session('setmenu');

        if (!$reservasi || !$setmenu) {
            return redirect()->back()->with('error', 'Data reservasi tidak ditemukan!');
        }

        // Hitung total
        $biaya_reservasi = $this->hitungBiayaReservasi($reservasi->jumlah_orang);
        $total_sebelum_ppn = $biaya_reservasi + $setmenu->Harga;
        $ppn = $total_sebelum_ppn * 0.11;
        $total_keseluruhan = $total_sebelum_ppn + $ppn;

        // Simpan transaksi - tidak mengisi status, biarkan default dari migration
        $transaksi = Transaksi::create([
            'reservasi_id' => $reservasi->id,
            'setmenu_id' => $setmenu->id,
            'total' => $total_keseluruhan,
            // status tidak diisi, akan menggunakan default 'proses' dari migration
        ]);

        // Hapus session
        session()->forget(['reservasi', 'setmenu']);

        // Redirect ke halaman daftarmenu dengan pesan sukses
        return redirect()->route('daftarmenu')->with('success', 'Pesanan berhasil dibuat! Status: Proses');
    }

    private function hitungBiayaReservasi($jumlah_orang)
    {
        if ($jumlah_orang <= 10) {
            return 100000;
        } elseif ($jumlah_orang <= 20) {
            return 200000;
        } elseif ($jumlah_orang <= 35) {
            return 350000;
        } elseif ($jumlah_orang <= 50) {
            return 500000;
        } elseif ($jumlah_orang <= 70) {
            return 700000;
        } elseif ($jumlah_orang <= 100) {
            return 1000000;
        } else {
            return 0;
        }
    }
}