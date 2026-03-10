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
        <!-- DETAIL -->
        <button type="button" class="btn-detail open-detail-modal" 
                data-id="{{ $transaksi->id }}"
                data-nama="{{ $transaksi->reservasi->nama }}"
                data-paket="{{ $transaksi->setmenu->Nama }}"
                data-jumlah="{{ $transaksi->reservasi->jumlah_orang }}"
                data-waktu="{{ $transaksi->reservasi->waktu }}"
                data-tanggal="{{ $transaksi->reservasi->tanggal }}"
                data-no="{{ $transaksi->reservasi->no_tlpn }}"
                data-total="{{ $transaksi->total }}"
                data-status="{{ $transaksi->status }}">
            Detail
        </button>

        <!-- EDIT -->
        <button type="button" class="btn-edit open-edit-modal" 
                data-id="{{ $transaksi->id }}"
                data-nama="{{ $transaksi->reservasi->nama }}"
                data-paket="{{ $transaksi->setmenu->Nama }}"
                data-jumlah="{{ $transaksi->reservasi->jumlah_orang }}"
                data-waktu="{{ $transaksi->reservasi->waktu }}"
                data-tanggal="{{ $transaksi->reservasi->tanggal }}"
                data-no="{{ $transaksi->reservasi->no_tlpn }}"
                data-total="{{ $transaksi->total }}"
                data-status="{{ $transaksi->status }}">
            Edit
        </button>

        <!-- HAPUS -->
        <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" class="delete-form" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="btn-delete">
                Hapus
            </button>
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

<script>
document.addEventListener('click', function(e) {
    const btn = e.target.closest('.open-edit-modal');
    if (btn) {
        e.preventDefault();
        
        // Ambil data dari atribut tombol
        const id = btn.dataset.id;
        
        // Masukkan ke input modal
        document.getElementById('modal_transaksi_id').value = id;
        document.getElementById('modal_nama').value = btn.dataset.nama;
        document.getElementById('modal_waktu').value = btn.dataset.waktu;
        document.getElementById('modal_tanggal').value = btn.dataset.tanggal;
        document.getElementById('modal_no').value = btn.dataset.no;
        document.getElementById('modal_status').value = btn.dataset.status;

        // Jika kamu ingin menampilkan Paket & Jumlah di modal edit (opsional)
        // pastikan ID-nya ada di HTML modalmu
        if(document.getElementById('modal_paket')) {
            document.getElementById('modal_paket').value = btn.dataset.paket;
        }

        // Set Action Form ke Route Update
        document.getElementById('editTransaksiForm').action = '/transaksi/' + id;

        // Munculkan Modal
        document.getElementById('editTransaksiModal').style.display = 'block';
    }
});
</script>

