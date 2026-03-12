<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Reservasi; 
use App\Models\SetMenu;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaksi::with(['reservasi', 'setmenu']);

        if ($request->search) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                // Filter berdasarkan Status di tabel Transaksi
                $q->where('status', 'like', "%$search%")
                
                // Filter berdasarkan Nama dan No Telepon di tabel Reservasi
                ->orWhereHas('reservasi', function ($q) use ($search) {
                    $q->where('nama', 'like', "%$search%")
                      ->orWhere('no_tlpn', 'like', "%$search%");
                })
                
                // Filter berdasarkan Nama Paket di tabel SetMenu
                ->orWhereHas('setmenu', function ($q) use ($search) {
                    $q->where('Nama', 'like', "%$search%");
                });
            });
        }

        $transaksis = $query->paginate(10)->withQueryString();

        if ($request->ajax()) {
            return view('partials.transaksi_table', compact('transaksis'))->render();
        }

        return view('Laporan', compact('transaksis'));
    }

    public function updateStatus(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->status = $request->status;
        $transaksi->save();

        return redirect()->back()->with('success', 'Status berhasil diupdate');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->back()->with('success', 'Transaksi berhasil dihapus');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('edit_transaksi', compact('transaksi'));
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        
        $reservasiData = $request->validate([
            'nama' => 'required|string|max:255',
            'waktu' => 'required',
            'tanggal' => 'required',
            'no_tlpn' => 'required|string|max:15',
        ]);
        $transaksi->reservasi->update($reservasiData);
        
        $transaksiData = $request->validate([
            'status' => 'required|in:proses,selesai,batal',
        ]);
        $transaksi->update($transaksiData);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Transaksi berhasil diperbarui'
            ]);
        }
        
        return redirect()->route('laporan.index')->with('success', 'Transaksi berhasil diperbarui');
    }
}