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
                $q->where('id', 'like', "%$search%")
                  ->orWhere('status', 'like', "%$search%");
            })
            ->orWhereHas('reservasi', function ($q) use ($search) {
                $q->where('nama', 'like', "%$search%")
                  ->orWhere('no_tlpn', 'like', "%$search%")
                  ->orWhere('waktu', 'like', "%$search%")
                  ->orWhere('jumlah_orang', 'like', "%$search%")
                  ->orWhere('tanggal', 'like', "%$search%");
            })
            ->orWhereHas('setmenu', function ($q) use ($search) {
                $q->where('Nama', 'like', "%$search%")
                  ->orWhere('Harga', 'like', "%$search%")
                  ->orWhere('Makanan', 'like', "%$search%");
            });
        }

        // Ensure newest data is shown first
        $query->orderByDesc('id');
        
        $transaksis = $query->paginate(8)->onEachSide(10)->withQueryString();

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

    // update full transaksi record (used by modal form)
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        
        // Update Reservasi data
        $reservasi = $transaksi->reservasi;
        $reservasiData = $request->validate([
            'waktu'   => 'required',
            'tanggal' => 'required',
            'no_tlpn' => 'required|string|max:15',
        ]);
        $reservasi->update($reservasiData);
        
        // Update Transaksi data
        $transaksiData = $request->validate([
            'status' => 'required|in:proses,selesai,batal',
        ]);
        $transaksi->update($transaksiData);

        return redirect()->route('laporan.index')->with('success', 'Transaksi berhasil diperbarui');
    }
}