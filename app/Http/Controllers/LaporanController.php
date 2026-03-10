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

    // update full transaksi record (used by modal form)
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        
        // Update Reservasi data
        $reservasi = $transaksi->reservasi;
        $reservasiData = $request->validate([
            'waktu' => 'required',
            'tanggal' => 'required',
            'no_telp' => 'required|string|max:15',
        ]);
        $reservasi->update($reservasiData);
        
        // Update Transaksi data
        $transaksiData = $request->validate([
            'status' => 'required|in:proses,selesai,batal',
        ]);
        $transaksi->update($transaksiData);

        // Return JSON response for AJAX
        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil diperbarui'
        ]);
    }
}