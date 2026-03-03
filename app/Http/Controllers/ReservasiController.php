<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\SetMenu;

class ReservasiController extends Controller
{
    public function store(Request $request)
{
     $request->validate([
        'nama' => 'required|max:100',
        'no_tlpn' => 'required|max:15',
        'waktu' => 'required',
        'jumlah_orang' => 'required|integer|min:1|max:100', // Tambah validasi max 100
        'tanggal' => 'required|date',
    ]);

    // Simpan data reservasi
    $reservasi = Reservasi::create([
        'nama' => $request->nama,
        'no_tlpn' => $request->no_tlpn,
        'waktu' => $request->waktu,
        'jumlah_orang' => $request->jumlah_orang,
        'tanggal' => $request->tanggal,
    ]);

    // Ambil paket setmenu yang dipilih (misal dikirim dari request)
    $setmenu = SetMenu::where('Nama', $request->menu)->first();

    // Simpan ke session agar transaksi.blade.php bisa otomatis menampilkan
    session(['reservasi' => $reservasi, 'setmenu' => $setmenu]);

    // Redirect ke halaman transaksi
    return redirect()->route('transaksi.show', $reservasi->id);

    $setmenu = SetMenu::where('Nama', $request->menu)->first();

session(['reservasi' => $reservasi, 'setmenu' => $setmenu]);
}
public function showTransaksi($id)
{
    $reservasi = Reservasi::findOrFail($id);
    $setmenu = session('setmenu'); // kalau pakai session seperti yang aku buat

    return view('transaksi', compact('reservasi', 'setmenu'));
}

}