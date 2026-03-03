<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard()
    {
        return view('Dashboard');
    }

    public function fasilitas()
    {
        return view('fasilitas');
    }

    public function daftarmenu()
    {
        return view('daftarmenu');
    }

    public function paket()
    {
        return view('paket');
    }

    public function tentang()
    {
        return view('tentang');
    }

     public function Laporan()
    {
        return view('Laporan');
    }

    public function daftarlogin()
    {
        return view('daftarlogin');
    }

    public function reservasi(Request $request)
{
    if (!$request->kategori || !$request->menu) {
        return redirect()->route('paket');
    }

    return view('reservasi');
}

public function transaksi(Request $request)
{
    return view('transaksi', [
        'paket' => $request->paket,
        'nama' => $request->nama,
        'telepon' => $request->telepon,
        'jumlah_orang' => $request->jumlah_orang,
        'tanggal' => $request->tanggal,
    ]);
}

}