<table class="transaksi-table">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Paket</th>
            <th>Jumlah Orang</th>
            <th>Waktu</th>
            <th>Tanggal</th>
            <th>No Tlpn</th>
            <th>Total</th>
            <th>Status</th>
            <th>Aktivitas</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transaksis as $transaksi)
        <tr>
            <td>{{ $transaksi->reservasi->nama }}</td>
            <td>{{ $transaksi->setmenu->Nama }}</td>
            <td>{{ $transaksi->reservasi->jumlah_orang }}</td>
            <td>{{ $transaksi->reservasi->waktu }}</td>
            <td>{{ $transaksi->reservasi->tanggal }}</td>
            <td>{{ $transaksi->reservasi->no_tlpn }}</td>
            <td>Rp {{ number_format($transaksi->total, 0, ',', '.') }}</td>
            <td>
                <form action="{{ route('transaksi.update-status', $transaksi->id) }}" method="POST" class="ajax-form">
                    @csrf
                    @method('PUT')
                    <select name="status" onchange="this.form.submit()">
                        <option value="proses" {{ $transaksi->status == 'proses' ? 'selected' : '' }}>Proses</option>
                        <option value="selesai" {{ $transaksi->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="batal" {{ $transaksi->status == 'batal' ? 'selected' : '' }}>Batal</option>
                    </select>
                </form>
            </td>
            <td>
                <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="9">
                <div class="table-pagination">
                    <span style="color: #666; font-size: 12px; margin-right: 15px;">Halaman {{ $transaksis->currentPage() }} dari {{ $transaksis->lastPage() }}</span>
                    {{ $transaksis->links('pagination::bootstrap-4') }}
                </div>
            </td>
        </tr>
    </tfoot>
</table>
