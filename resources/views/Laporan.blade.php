<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi - Pawon Djawa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Laporan.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f4f4; }
        
        /* Kontainer Tabel Utama */
        .table-container {
            background: white; border-radius: 8px; margin: 0 20px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.2); overflow-x: auto;
        }

        .table { margin-bottom: 0; min-width: 1050px; table-layout: fixed; }
        .table thead tr { background-color: #c04848 !important; color: white; }
        .table th, .table td { vertical-align: middle !important; font-size: 13px; padding: 12px 8px !important; }

        /* Pengaturan Kolom Tabel Utama */
        .col-nama { width: 140px; } .col-paket { width: 140px; } .col-jml { width: 70px; }
        .col-waktu { width: 85px; } .col-tgl { width: 105px; } .col-telp { width: 120px; }
        .col-total { width: 120px; } .col-status { width: 90px; } .col-aksi { width: 190px; }

        .table-pagination { display: flex; align-items: center; justify-content: flex-end; padding: 10px 20px; background: #f9f9f9; }
        .page-link { color: #c04848; }
        .page-item.active .page-link { background-color: #c04848; border-color: #c04848; }

        /* Search Bar Style */
        .search-container { margin: 0 20px 20px 20px; display: flex; justify-content: flex-end; }
        .search-input { border-radius: 20px 0 0 20px; border: 1px solid #ddd; padding: 5px 20px; outline: none; }
        .search-button { border-radius: 0 20px 20px 0; background: #c04848; color: white; border: none; padding: 5px 20px; }

        /* Modal Settings */
        @keyframes modalFadeIn {
            0% { opacity: 0; transform: translate(-50%, -60%) scale(0.8); }
            100% { opacity: 1; transform: translate(-50%, -50%) scale(1); }
        }
        .modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.6); backdrop-filter: blur(4px); z-index: 9999; }
        .modal-dialog-centered { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 95%; max-width: 450px; }

        /* Scroll Area khusus Detail Modal */
        .modal-detail-scroll {
            max-width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            border-radius: 8px;
        }

        .table-modal-detail {
            min-width: 350px;
            width: 100%;
            margin-bottom: 0;
            background: white;
        }

        .table-modal-detail td {
            white-space: nowrap;
            font-size: 14px;
        }

        .label-cell {
            background: #bc9c75 !important;
            color: white;
            width: 120px;
            font-weight: 600;
        }
    </style>
</head>
<body>

<section class="tentang-section" style="padding: 30px 0;">
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="/"><img src="{{ asset('images/logo.png') }}" style="max-height: 70px;"></a>
        <h2 style="font-weight: 600; color: #c04848; font-size: 22px; margin-top: 10px;">LAPORAN TRANSAKSI</h2>
    </div>

    <div class="search-container">
        <form action="{{ route('laporan.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="search-input" placeholder="Cari nama pelanggan..." value="{{ request('search') }}">
            <button type="submit" class="search-button">Cari</button>
        </form>
    </div>

    <div class="table-container">
        <table class="table text-center">
            <thead>
                <tr>
                    <th class="col-nama">Nama</th>
                    <th class="col-paket">Paket</th>
                    <th class="col-jml">Orang</th>
                    <th class="col-waktu">Waktu</th>
                    <th class="col-tgl">Tanggal</th>
                    <th class="col-telp">No Tlpn</th>
                    <th class="col-total">Total</th>
                    <th class="col-status">Status</th>
                    <th class="col-aksi">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transaksis as $t)
                <tr>
                    <td class="text-left"><strong>{{ $t->reservasi->nama ?? '-' }}</strong></td>
                    <td>{{ $t->setmenu->Nama ?? '-' }}</td>
                    <td>{{ $t->reservasi->jumlah_orang ?? '-' }}</td>
                    <td>{{ $t->reservasi->waktu ?? '-' }}</td>
                    <td>{{ $t->reservasi->tanggal ?? '-' }}</td>
                    <td>{{ $t->reservasi->no_tlpn ?? '-' }}</td>
                    <td>Rp {{ number_format($t->total, 0, ',', '.') }}</td>
                    <td><span class="badge badge-info">{{ ucfirst($t->status) }}</span></td>
                    <td>
                        <button class="btn btn-sm btn-info open-detail-modal" 
                                data-nama="{{ $t->reservasi->nama ?? '' }}" 
                                data-paket="{{ $t->setmenu->Nama ?? '' }}" 
                                data-jumlah="{{ $t->reservasi->jumlah_orang ?? '' }}"
                                data-waktu="{{ $t->reservasi->waktu ?? '' }}"
                                data-tanggal="{{ $t->reservasi->tanggal ?? '' }}"
                                data-no="{{ $t->reservasi->no_tlpn ?? '' }}"
                                data-total="{{ $t->total }}"
                                data-status="{{ $t->status }}">Detail</button>
                        
                        <button class="btn btn-sm btn-warning open-edit-modal"
                                data-id="{{ $t->id }}"
                                data-nama="{{ $t->reservasi->nama ?? '' }}"
                                data-waktu="{{ $t->reservasi->waktu ?? '' }}"
                                data-tanggal="{{ $t->reservasi->tanggal ?? '' }}"
                                data-no="{{ $t->reservasi->no_tlpn ?? '' }}"
                                data-status="{{ $t->status }}">Edit</button>
                        
                        <form action="/transaksi/{{ $t->id }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="9" class="py-4">Data tidak ditemukan.</td></tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="9" style="padding: 0 !important;">
                        <div class="table-pagination">
                            <span style="color: #666; font-size: 12px; margin-right: 15px;">Halaman {{ $transaksis->currentPage() }} dari {{ $transaksis->lastPage() }}</span>
                            {{ $transaksis->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</section>

<div id="detailTransaksiModal" class="modal">
    <div class="modal-dialog-centered">
        <div class="modal-content" style="border-radius:12px; overflow: hidden; animation: modalFadeIn 0.3s ease;">
            <div class="modal-header" style="background: #bc9c75; color: white; justify-content: center; border-bottom: none;">
                <h5 style="margin:0; font-size:16px; font-weight: 600;">DETAIL TRANSAKSI</h5>
            </div>
            <div class="modal-body" style="background:#faf8f5;">
                <div class="modal-detail-scroll">
                    <table class="table table-bordered table-modal-detail">
                        <tbody>
                            <tr><td class="label-cell">NAMA</td><td id="detail_nama"></td></tr>
                            <tr><td class="label-cell">PAKET</td><td id="detail_paket"></td></tr>
                            <tr><td class="label-cell">JUMLAH</td><td id="detail_jumlah"></td></tr>
                            <tr><td class="label-cell">WAKTU</td><td id="detail_waktu"></td></tr>
                            <tr><td class="label-cell">TANGGAL</td><td id="detail_tanggal"></td></tr>
                            <tr><td class="label-cell">TOTAL</td><td id="detail_total" style="font-weight:bold; color: #c04848;"></td></tr>
                            <tr><td class="label-cell" style="background:#d4a574 !important;">STATUS</td><td id="detail_status"></td></tr>
                        </tbody>
                    </table>
                </div>
                <p class="text-muted text-center mt-2" style="font-size: 10px;">*Geser ke kanan untuk melihat rincian lengkap</p>
                <div class="text-center mt-3">
                    <button type="button" class="btn btn-outline-secondary btn-tutup-modal" style="border-radius: 20px; padding: 5px 30px;">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="editTransaksiModal" class="modal">
    <div class="modal-dialog-centered">
        <div class="modal-content" style="border-radius:12px; overflow: hidden; animation: modalFadeIn 0.3s ease;">
            <div class="modal-header" style="background: #bc9c75; color: white; justify-content: center;">
                <h5 style="margin:0; font-size:16px;">EDIT TRANSAKSI</h5>
            </div>
            <div class="modal-body" style="background:#faf8f5;">
                <form id="editTransaksiForm" method="POST">
                    @csrf @method('PUT')
                    <div class="form-group"><label class="small font-weight-bold">Nama</label><input type="text" name="nama" id="modal_nama" class="form-control"></div>
                    <div class="row">
                        <div class="col-6"><div class="form-group"><label class="small font-weight-bold">Waktu</label><input type="text" name="waktu" id="modal_waktu" class="form-control"></div></div>
                        <div class="col-6"><div class="form-group"><label class="small font-weight-bold">Tanggal</label><input type="date" name="tanggal" id="modal_tanggal" class="form-control"></div></div>
                    </div>
                    <div class="form-group"><label class="small font-weight-bold">No Tlpn</label><input type="text" name="no_tlpn" id="modal_no" class="form-control"></div>
                    <div class="form-group">
                        <label class="small font-weight-bold">Status</label>
                        <select name="status" id="modal_status" class="form-control">
                            <option value="proses">Proses</option>
                            <option value="selesai">Selesai</option>
                            <option value="batal">Batal</option>
                        </select>
                    </div>
                    <div class="text-center mt-3">
                        <button type="button" class="btn btn-outline-secondary btn-tutup-modal" style="border-radius: 20px;">Batal</button>
                        <button type="submit" class="btn btn-warning" style="border-radius: 20px; background: #c04848; color: white; border: none;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const editModal = document.getElementById('editTransaksiModal');
    const detailModal = document.getElementById('detailTransaksiModal');

    document.querySelectorAll('.btn-tutup-modal').forEach(btn => {
        btn.onclick = () => { editModal.style.display = 'none'; detailModal.style.display = 'none'; }
    });

    document.querySelectorAll('.open-detail-modal').forEach(btn => {
        btn.onclick = function() {
            document.getElementById('detail_nama').innerText = this.dataset.nama;
            document.getElementById('detail_paket').innerText = this.dataset.paket;
            document.getElementById('detail_jumlah').innerText = this.dataset.jumlah + ' Orang';
            document.getElementById('detail_waktu').innerText = this.dataset.waktu;
            document.getElementById('detail_tanggal').innerText = this.dataset.tanggal;
            const total = parseInt(this.dataset.total) || 0;
            document.getElementById('detail_total').innerText = 'Rp ' + total.toLocaleString('id-ID');
            document.getElementById('detail_status').innerText = this.dataset.status.toUpperCase();
            detailModal.style.display = 'block';
        }
    });

    document.querySelectorAll('.open-edit-modal').forEach(btn => {
        btn.onclick = function() {
            document.getElementById('modal_nama').value = this.dataset.nama;
            document.getElementById('modal_waktu').value = this.dataset.waktu;
            document.getElementById('modal_tanggal').value = this.dataset.tanggal;
            document.getElementById('modal_no').value = this.dataset.no;
            document.getElementById('modal_status').value = this.dataset.status;
            document.getElementById('editTransaksiForm').action = '/transaksi/' + this.dataset.id;
            editModal.style.display = 'block';
        }
    });

    window.onclick = (e) => {
        if (e.target == editModal) editModal.style.display = 'none';
        if (e.target == detailModal) detailModal.style.display = 'none';
    }
});
</script>
</body>
</html>