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
        $transaksis = Transaksi::with(['reservasi', 'setmenu'])->paginate(10);

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
}